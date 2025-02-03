<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return 'Optimized';
});

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Linked';
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');

Route::get('email/verify/view/{id}/{hash}', [VerifyController::class, 'viewEmail'])->name('email.verification.view');
Route::get('password/reset/view/{email}/{token}', [VerifyController::class, 'viewInBrowser'])->name('password.reset.view');

Route::middleware('guest')->group(function () {
    Route::get('/auth/google', [SocialController::class, 'redirectGoogle'])->name('google-login');

    Route::get('/auth/google/callback', [SocialController::class, 'google'])->name('google-callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify/{id}/{hash}', [VerifyController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])->withoutMiddleware(['auth'])->name('verification.verify');
});

require __DIR__ . '/admin.php';

Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::get('/api-docs', function () {
    return view('docs.api-docs');
})->name('api-docs');

Route::get('/send-test-email', function () {
    \Illuminate\Support\Facades\Mail::raw('This is a test email', function ($message) {
        $message->to('sameedhassan22@gmail.com')
            ->subject('Test Email');
    });

    return 'Test email sent';
});
