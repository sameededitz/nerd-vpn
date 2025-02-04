<?php

use App\Http\Controllers\SocialController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Route;

Route::get('email/verify/view/{id}/{hash}', [VerifyController::class, 'viewEmail'])->name('email.verification.view');
Route::get('password/reset/view/{email}/{token}', [VerifyController::class, 'viewInBrowser'])->name('password.reset.view');

Route::middleware('guest')->group(function () {
    Route::get('/auth/google', [SocialController::class, 'redirectGoogle'])->name('google-login');

    Route::get('/auth/google/callback', [SocialController::class, 'google'])->name('google-callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/email/verify/{id}/{hash}', [VerifyController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])->withoutMiddleware(['auth'])->name('verification.verify');
});