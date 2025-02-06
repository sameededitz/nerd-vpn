<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\StripeCheckoutSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            if ($plan->lifetime) {
                $checkoutSession = $user->checkout($plan->stripe_plan_id, [
                    'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}', // Route to redirect to after a successful payment
                    'cancel_url' => route('checkout.cancel'),
                    'metadata' => [
                        'plan_id' => $plan->id,
                        'lifetime' => true
                    ],
                ]);
            } else {
                $checkoutSession = $user->newSubscription('default', $plan->stripe_plan_id)
                    ->checkout([
                        'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}', // Route to redirect to after a successful payment
                        'cancel_url' => route('checkout.cancel'),
                        'metadata' => [
                            'plan_id' => $plan->id,
                        ],
                    ]);
            }

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

        if (!$sessionId || session('checkout_session_id') !== $sessionId) {
            return redirect()->route('pricing')->with([
                'status' => 'error',
                'message' => 'Invalid session or session expired.',
            ]);
        }

        try {
            $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);

            if ($session->payment_status !== 'paid') {
                return redirect()->route('checkout.cancel');
            }

            $planId = $session->metadata->plan_id ?? null;

            if (!$planId) {
                return redirect()->route('checkout.cancel');
            }
            $plan = Plan::find($planId);

            if (!$plan) {
                return redirect()->route('checkout.cancel');
            }

            /** @var \App\Models\User $user **/
            $user = Auth::user();

            session()->forget('checkout_session_id');

            // Retrieve the purchase record created/updated by the webhook listener.
            // This assumes that the webhook listener has already processed the session and updated the DB.
            $purchase = $user->purchases()
                ->where('plan_id', $plan->id)
                ->where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->first();

            return view('home.success', compact('plan', 'purchase'));
        } catch (ApiErrorException $e) {
            Log::error('Stripe API error: ' . $e->getMessage());
            return redirect()->route('checkout.cancel')->with('error', 'An error occurred while processing your payment.');
        } catch (\Exception $e) {
            Log::error('Error during checkout success: ' . $e->getMessage());
            return redirect()->route('checkout.cancel')->with('error', 'An error occurred while processing your payment.');
        }
    }

    public function cancel()
    {
        $sessionId = session('checkout_session_id');

        if (!$sessionId) {
            // If no session ID is found, redirect to the pricing page
            return redirect()->route('pricing')->with([
                'status' => 'error',
                'message' => 'No active checkout session found.',
            ]);
        }

        // Clear the session ID from the user's session
        session()->forget('checkout_session_id');
        return view('home.cancel');
    }

    public function billingPortal(Request $request)
    {
        return $request->user()->redirectToBillingPortal(route('billing'));
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
