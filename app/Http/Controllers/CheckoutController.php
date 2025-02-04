<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\StripeCheckoutSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;

class CheckoutController extends Controller
{
    public function checkout(Plan $plan)
    {
        if (!$plan) {
            return redirect()->route('pricing');
        }

        /** @var \App\Models\User $user **/
        $user = Auth::user();

        return $user->newSubscription('default', $plan->stripe_plan_id)
            ->checkout([
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}', // Route to redirect to after a successful payment
                'cancel_url' => route('checkout.cancel'),
                'metadata' => [
                    'plan_id' => $plan->id,
                ],
            ]);
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
        $duration = $plan->duration;

        if ($purchase) {
            $currentExpiresAt = Carbon::parse($purchase->expires_at);

            // Extend the expiration date instead of replacing it
            $newExpiresAt = match ($plan->duration_unit) {
                'day'   => $currentExpiresAt->addDays($duration),
                'week'  => $currentExpiresAt->addWeeks($duration),
                'month' => $currentExpiresAt->addMonths($duration),
                'year'  => $currentExpiresAt->addYears($duration),
                default => $currentExpiresAt->addDays(7),
            };

            // Update the purchase with the new expiration date
            $purchase->update([
                'expires_at' => $newExpiresAt,
            ]);
        } else {
            $expiresAt = match ($plan->duration_unit) {
                'day'   => now()->addDays($duration),
                'week'  => now()->addWeeks($duration),
                'month' => now()->addMonths($duration),
                'year'  => now()->addYears($duration),
                default => now()->addDays(7),
            };
            // Create a new purchase
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

        return view('home.success', compact('plan', 'purchase'));
    }

    public function cancel()
    {
        return view('home.cancel');
    }
}
