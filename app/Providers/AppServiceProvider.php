<?php

namespace App\Providers;

use App\Listeners\StripeEventListener;
use App\Listeners\UpdateLastLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Events\WebhookReceived;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            WebhookReceived::class,
            StripeEventListener::class
        );
        Event::listen(
            Login::class,
            UpdateLastLogin::class
        );

        $token = env('IP_INFO_KEY', '22c6e0d52b99c0'); // Default token if env key is missing

        $ipInfo = Cache::remember("user_ip_info", now()->addMinutes(30), function () use ($token) {
            return Http::get("https://ipinfo.io/json?token={$token}")->json();
        });

        // Extract details
        $userIp = $ipInfo['ip'] ?? 'Unknown IP';
        $userLocation = isset($ipInfo['city'], $ipInfo['country']) ? "{$ipInfo['city']}, {$ipInfo['country']}" : 'Unknown Location';

        // Share with views
        View::composer('partials.home.navbar', function ($view) use ($userIp, $userLocation) {
            $view->with([
                'userIp' => $userIp,
                'userLocation' => $userLocation,
            ]);
        });
    }
}
