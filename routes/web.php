<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\User\UserController as AdminUserController;
use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Storage\StorageController;
use App\Http\Controllers\User\BlockedController;
use App\Http\Controllers\User\UserController as User;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {

    Route::group(['namespace' => 'Auth'], function () {
        // Login
        Route::get('/login', [LoginController::class, 'create'])->name('login');
        Route::post('/login', [LoginController::class, 'store'])->name('login.store');

        // Register
        Route::get('/register', [RegisterController::class, 'create'])->name('register');
        Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

        // Forgot-password
        Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
        Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot'])->name('forgot-password.action');
    });

    // main page
    Route::get('/', [SiteController::class, 'index'])->name('index');
});


// Auth
Route::group(['middleware' => 'auth'], function () {

    // If user blocked
    Route::get('/blocked', [BlockedController::class, 'index'])->name('user.blocked')->middleware();

    // email verified user
    Route::group(['middleware' => ['verified', 'noblocked']], function () {

        // Storage
        Route::get('/storage', [StorageController::class, 'index'])->name('storage');
        Route::get('/user/get', [User::class, 'get']);

        // Admin
        Route::group([
            'prefix' => '/admin', 
            'middleware' => 'admin',
            'namespace' => 'Admin'],function () {
                
            Route::get('/', [AdminController::class, 'index'])->name('admin');

            // Operations with users
            Route::group(['namespace' => '/User'], function(){
                Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
                Route::get('/user/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
                Route::put('/user/{id}/edit', [AdminUserController::class, 'update'])->name('admin.users.edit.update');
            });
        });
    });

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
});
