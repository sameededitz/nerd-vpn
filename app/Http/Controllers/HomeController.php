<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }

    public function about()
    {
        return view('home.about');
    }

    public function pricing()
    {
        $plans = Plan::all();

        $userHasActiveSubscription = false;
        $userHasLifetimePlan = false;

        if (Auth::check()) {
            /** @var \App\Models\User $user **/
            $user = Auth::user();

            $activePurchase = $user->purchases()
                ->where('is_active', true)
                ->where(function ($query) {
                    $query->where('expires_at', '>', now()) // Active subscription
                        ->orWhereNull('expires_at'); // No expiry (lifetime or ongoing)
                })
                ->first();

            // Check if the user has a lifetime plan
            if ($activePurchase && $activePurchase->is_lifetime) {
                $userHasLifetimePlan = true;
            }

            $subscription = $user->subscription('default');
            $userHasActiveSubscription = $subscription && ($subscription->active() || $subscription->onGracePeriod());
        }

        return view('home.pricing', compact('plans', 'userHasActiveSubscription', 'userHasLifetimePlan'));
    }

    public function test()
    {
        return view('home.success');
    }
}
