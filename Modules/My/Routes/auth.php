<?php

use Modules\My\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\My\Http\Controllers\Auth\ConfirmablePasswordController;
use Modules\My\Http\Controllers\Auth\EmailVerificationNotificationController;
use Modules\My\Http\Controllers\Auth\EmailVerificationPromptController;
use Modules\My\Http\Controllers\Auth\NewPasswordController;
use Modules\My\Http\Controllers\Auth\PasswordController;
use Modules\My\Http\Controllers\Auth\PasswordResetLinkController;
use Modules\My\Http\Controllers\Auth\RegisteredUserController;
use Modules\My\Http\Controllers\Auth\SocialAuthController;
use Modules\My\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest.my')->group(
    function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('my.register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('my.login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('my.password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('my.password.email');

        Route::any('forgot-email-sent', [PasswordResetLinkController::class, 'sent'])
            ->name('my.password.sent');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('my.password.store');

        Route::get('/login-google', [SocialAuthController::class, 'redirectToProvider'])
            ->name('my.google.login');

        Route::get('/auth/google/callback', [SocialAuthController::class, 'handleCallback'])
            ->name('my.google.login.callback');
    }
);

Route::middleware('auth.my')->group(
    function () {
        Route::get('verify-email', EmailVerificationPromptController::class)
            ->name('my.verification.notice');

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('my.verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('my.verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->name('my.password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::put('password', [PasswordController::class, 'update'])->name('my.password.update');

        Route::any('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('my.logout');
    }
);
