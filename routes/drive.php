<?php

use App\Http\Controllers\Drive\DriveController;
use Illuminate\Support\Facades\Route;


Route::get('/get/{id}', [DriveController::class, 'share'])->name('file.get');

Route::get('/download/{id}', [DriveController::class, 'download'])->name('file.download');

Route::group(['middleware' => ['auth', 'verified', 'noblocked']], function () {
    
Route::get('/get/{id}/thumbnail', [DriveController::class, 'thumbnail'])->name('file.get.thumbnail');
});

