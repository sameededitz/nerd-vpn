<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\StripeCheckoutSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Cashier;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    public function checkout(Plan $plan)
    {
        if (!$plan) {
            return redirect()->route('pricing');
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        try {
            $checkoutSession = $user->newSubscription('default', $plan->stripe_plan_id)
                ->checkout([
                    'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}', // Route to redirect to after a successful payment
                    'cancel_url' => route('checkout.cancel'),
                    'metadata' => [
                        'plan_id' => $plan->id,
                    ],
                ]);

            session(['checkout_session_id' => $checkoutSession->id]);

            return $checkoutSession;
        } catch (\Exception $e) {
            Log::error('Checkout failed: ' . $e->getMessage());
            return redirect()->route('pricing')->with([
                'status' => 'error',
                'message' => 'Checkout process failed. Please try again.',
            ]);
        }
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if (!$sessionId) {
            return redirect()->route('pricing');
        }

        if (StripeCheckoutSession::where('session_id', $sessionId)->exists()) {
            return redirect()->route('home')->with([
                'status' => 'error',
                'message' => 'Checkout session has already been used',
            ]);
        }

        DB::beginTransaction();
        try {
            $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);

            if ($session->payment_status !== 'paid') {
                return redirect()->route('checkout.cancel');
            }

            $planId = $session->metadata->plan_id ?? null;

            if (!$planId) {
                return redirect()->route('checkout.cancel');
            }

            $plan = Plan::findOrFail($planId);

            /** @var \App\Models\User $user **/
            $user = Auth::user();

            $purchase = $user->purchases()
                ->where('is_active', true)
                ->where('expires_at', '>', now())
                ->first();

            $expiresAt = $this->calculateExpirationDate($plan, $purchase);

            if ($purchase) {
                $purchase->update(['expires_at' => $expiresAt]);
            } else {
                $purchase = $user->purchases()->create([
                    'plan_id' => $plan->id,
                    'started_at' => now(),
                    'expires_at' => $expiresAt,
                    'is_active' => true,
                ]);
            }

            StripeCheckoutSession::create([
                'session_id' => $sessionId,
                'user_id' => $user->id,
                'plan_id' => $plan->id,
            ]);

            DB::commit();

            return view('home.success', compact('plan', 'purchase'));
        } catch (ApiErrorException $e) {
            DB::rollBack();
            Log::error('Stripe API error: ' . $e->getMessage());
            return redirect()->route('checkout.cancel')->with('error', 'An error occurred while processing your payment.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error during checkout success: ' . $e->getMessage());
            return redirect()->route('checkout.cancel')->with('error', 'An error occurred while processing your payment.');
        }
    }

    public function cancel()
    {
        $sessionId = session('checkout_session_id');

        if ($sessionId) {
            StripeCheckoutSession::where('session_id', $sessionId)->delete();
        }
        return view('home.cancel');
    }

    protected function calculateExpirationDate(Plan $plan, $purchase = null)
    {
        $duration = $plan->duration;
        $currentExpiresAt = $purchase ? Carbon::parse($purchase->expires_at) : now();

        return match ($plan->duration_unit) {
            'day'   => $currentExpiresAt->addDays($duration),
            'week'  => $currentExpiresAt->addWeeks($duration),
            'month' => $currentExpiresAt->addMonths($duration),
            'year'  => $currentExpiresAt->addYears($duration),
            default => $currentExpiresAt->addDays(7),
        };
    }
}
