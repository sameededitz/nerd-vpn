<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');

Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

    Route::get('/billing-portal', [CheckoutController::class, 'billingPortal'])->name('billing-portal');

    Route::get('/checkout/{plan:slug}', [CheckoutController::class, 'checkout'])->name('checkout');

    Route::post('/cancel-subscription', [PageController::class, 'cancelSubscription'])->name('cancel-subscription');

    Route::post('/resume-subscription', [PageController::class, 'resumeSubscription'])->name('renew-subscription');

    Route::post('/cancel-now-subscription', [PageController::class, 'cancelNowSubscription'])->name('cancel-now-subscription');
});

Route::group(['prefix' => 'profile', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [PageController::class, 'profile'])->name('profile');

    Route::get('/billing', [PageController::class, 'billing'])->name('billing');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::get('/api/docs', function () {
    return view('docs.api-docs');
})->name('api-docs');

Route::get('/send-test-email', function () {
    \Illuminate\Support\Facades\Mail::raw('This is a test email', function ($message) {
        $message->to('sameedhassan22@gmail.com')
            ->subject('Test Email');
    });

    return 'Test email sent';
});

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return 'Optimized';
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Linked';
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
    return 'Migrated';
});

Route::get('/migrate-fresh', function () {
    Artisan::call('migrate:fresh --seed');
    return 'Migrated';
});

Route::get('/debug-ip', function () {
    return response()->json([
        'ip' => request()->ip(),
        'cf_ip' => request()->header('CF-Connecting-IP'),
        'xff_ip' => request()->header('X-Forwarded-For'),
    ]);
});
