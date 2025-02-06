<?php

namespace App\Providers;

use App\Listeners\StripeEventListener;
use App\Listeners\UpdateLastLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
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

        $ip = request()->ip();
        // Force IPv4 if the IP is IPv6
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            // Get the IPv4 address from the X-Forwarded-For header if behind a proxy (e.g., Cloudflare)
            $ip = request()->header('X-Forwarded-For', $ip);
        }

        $location = Cache::remember("user_location_{$ip}", now()->addMinutes(30), function () use ($ip) {
            $response = Http::get("http://ip-api.com/json/{$ip}")->json();
            return isset($response['city']) ? $response['city'] . ', ' . $response['country'] : 'Unknown';
        });

        View::composer('partials.home.navbar', function ($view) use ($ip, $location) {
            $view->with([
                'userIp' => $ip,
                'userLocation' => $location
            ]);
        });
    }
}
