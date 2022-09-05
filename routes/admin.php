<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

// IndexPage
Route::get('/', [AdminController::class, 'index'])->name('admin');

// Operations with users   

Route::get('/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/user/{id}/edit', [UserController::class, 'update'])->name('admin.users.edit.update');
