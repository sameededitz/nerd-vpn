<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('home.profile', compact('user'));
    }

    public function billing()
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        // Retrieve the latest active purchase for the user.
        $purchase = $user->purchases()
            ->where('is_active', true)
            ->latest('created_at')
            ->first();

        // Get the associated plan, if available.
        $plan = $purchase ? $purchase->plan : null;

        // Optionally, set a flag if no active subscription is found.
        $hasActiveSubscription = !is_null($purchase);

        return view('home.billing', compact('user', 'purchase', 'plan', 'hasActiveSubscription'));
    }

    public function cancelSubscription(Request $request)
    {
        $user = $request->user();

        // Check if the user has an active subscription named "default"
        if ($user->subscribed('default')) {
            // Cancel the subscription at period end. (Use cancelNow() if you want immediate cancellation)
            $user->subscription('default')->cancel();

            // Optionally, you could update the local purchase record immediately here,
            // but you may also rely on your Stripe webhook to mark the purchase as inactive
            // when the subscription period ends.
            return redirect()->back()->with('status', 'Your subscription has been canceled. You will retain access until the end of your billing period.');
        }

        return redirect()->back()->with('status', 'No active subscription found.');
    }

    public function cancelNowSubscription(Request $request)
    {
        /** @var \App\Models\User $user **/
        $user = $request->user();

        // Check if the user has a subscription on grace period or active.
        if ($user->subscription('default')->active() || $user->subscription('default')->onGracePeriod()) {
            try {
                // Cancel immediately
                $user->subscription('default')->cancelNow();

                // Optionally, if you want to mark the purchase record as inactive immediately,
                // you can update it here. Otherwise, rely on your webhook to handle this.
                $purchase = $user->purchases()
                    ->where('is_active', true)
                    ->whereNotNull('expires_at')
                    ->where('expires_at', '>', now())
                    ->first();

                if ($purchase) {
                    return redirect()->back()->with('status', 'Your subscription has been canceled immediately. You can continue using the service until ' . $purchase->expires_at->toFormattedDateString() . '. You can now purchase another plan.');
                }else{
                    return redirect()->back()->with('status', 'Your subscription has been canceled, and you no longer have access. You can now purchase another plan.');
                }
            } catch (\Exception $e) {
                Log::channel('stripe')->error('Failed to cancel subscription: ', ['exception' => $e->getMessage()]);
                return redirect()->back()->with('status', 'An error occurred while canceling your subscription.');
            }
        } else {
            return redirect()->back()->with('status', 'No subscription available to cancel.');
        }
    }

    public function resumeSubscription(Request $request)
    {
        $user = $request->user();

        // Check if the subscription is on grace period (i.e. canceled but not expired)
        if ($user->subscription('default')->onGracePeriod()) {
            $user->subscription('default')->resume();

            // Optionally, you can update the local purchase record here if needed.
            return redirect()->back()->with('status', 'Your subscription has been resumed.');
        }

        return redirect()->back()->with('status', 'Your subscription is not eligible for resumption. Please renew your subscription via the checkout.');
    }
}
