<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
    
    Route::get('/checkout/{plan:slug}', [CheckoutController::class, 'checkout'])->name('checkout');
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
