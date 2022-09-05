<?php

use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\BlockedController;
use Illuminate\Support\Facades\Route;

// User blocked
Route::get('/blocked', [BlockedController::class, 'index'])->name('user.blocked')->middleware();

// Email verify
Route::group(['prefix' => '/email'], function () {
    Route::get('/verify', [EmailVerifyController::class, 'index'])->name('verification.notice');
    Route::get(
        '/verification-notification',
        [EmailVerifyController::class, 'notification']
    )->middleware('throttle:6,1')->name('verification.send');
    Route::get('/verify/{id}/{hash}', [EmailVerifyController::class, 'verification'])->name('verification.verify');
});

// Logout
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
