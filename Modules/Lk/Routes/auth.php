<?php

use Modules\Lk\Http\Controllers\Auth\AuthenticatedSessionController;
use Modules\Lk\Http\Controllers\Auth\ConfirmablePasswordController;
use Modules\Lk\Http\Controllers\Auth\EmailVerificationNotificationController;
use Modules\Lk\Http\Controllers\Auth\EmailVerificationPromptController;
use Modules\Lk\Http\Controllers\Auth\NewPasswordController;
use Modules\Lk\Http\Controllers\Auth\PasswordController;
use Modules\Lk\Http\Controllers\Auth\PasswordResetLinkController;
use Modules\Lk\Http\Controllers\Auth\RegisteredUserController;
use Modules\Lk\Http\Controllers\Auth\SocialAuthController;
use Modules\Lk\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest.lk')->group(
    function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('lk.register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('lk.login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('lk.password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('lk.password.email');

        Route::any('forgot-email-sent', [PasswordResetLinkController::class, 'sent'])
            ->name('lk.password.sent');

        Route::get('reset-password/{email}/{token}', [NewPasswordController::class, 'create'])
            ->name('lk.password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('lk.password.store');

        Route::get('/login-google', [SocialAuthController::class, 'redirectToProvider'])
            ->name('lk.google.login');

        Route::get('/auth/google/callback', [SocialAuthController::class, 'handleCallback'])
            ->name('lk.google.login.callback');
    }
);

Route::middleware('auth.lk')->group(
    function () {
        Route::get('verify-email', EmailVerificationPromptController::class)
            ->name('lk.verification.notice');

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('lk.verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('lk.verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->name('lk.password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::put('password', [PasswordController::class, 'update'])->name('lk.password.update');

        Route::any('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('lk.logout');
    }
);
