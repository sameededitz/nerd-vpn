<?php

namespace App\Providers;

use App\Listeners\StripeEventListener;
use App\Listeners\UpdateLastLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
    public function boot(Request $request): void
    {
        Event::listen(
            WebhookReceived::class,
            StripeEventListener::class
        );
        Event::listen(
            Login::class,
            UpdateLastLogin::class
        );

        // dd($request->ip());

        $ipAddress = $request->ip();

        // Check if the IP is IPv6 and convert it to IPv4 if possible
        if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $ipAddress = $this->convertIPv6ToIPv4($ipAddress);
        }

        dd($ipAddress);

        // $ip = $request->ip();
        // // Force IPv4 if the IP is IPv6
        // if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        //     // Get the IPv4 address from the X-Forwarded-For header if behind a proxy (e.g., Cloudflare)
        //     $ip = request()->header('X-Forwarded-For', $ip);
        // }

        // $token = env('IP_INFO_KEY') ?? '22c6e0d52b99c0';
        // $ipInfo = Cache::remember("user_ip_info_{$ip}", now()->addMinutes(30), function () use ($ip, $token) {
        //     $response = Http::get("https://ipinfo.io/{$ip}/json?token={$token}")->json();
        //     return $response;
        // });

        // // Extract IP and location information
        // $userIp = isset($ipInfo['ip']) ? $ipInfo['ip'] : 'Unknown IP';
        // $userLocation = isset($ipInfo['city']) && isset($ipInfo['country']) ? $ipInfo['city'] . ', ' . $ipInfo['country'] : 'Unknown Location';

        // View::composer('partials.home.navbar', function ($view) use ($ip, $userLocation) {
        //     $view->with([
        //         'userIp' => $ip,
        //         'userLocation' => $userLocation
        //     ]);
        // });
    }

    private function convertIPv6ToIPv4($ipv6)
    {
        // This is a basic example and may not work for all IPv6 addresses
        if (substr($ipv6, 0, 7) == '::ffff:') {
            return substr($ipv6, 7);
        }
        return $ipv6; // Return the original IPv6 if conversion is not possible
    }
}
