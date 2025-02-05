<?php

namespace App\Providers;

use App\Listeners\StripeEventListener;
use App\Listeners\UpdateLastLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\RateLimiter;
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
    }
}
