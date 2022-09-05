<?php

use App\Http\Controllers\Storage\FileController;
use App\Http\Controllers\Storage\FolderController;
use App\Http\Controllers\Storage\StorageController;
use Illuminate\Support\Facades\Route;

Route::get('/{id?}', [StorageController::class, 'index'])->name('storage');

Route::post('/upload/file', [FileController::class, 'upload'])->name('storage.upload.file');
Route::get('/get/file/{id}/', [FileController::class, 'get'])->name('storage.get.file');
Route::get('/delete/file/{id}/', [FileController::class, 'delete'])->name('storage.delete.file');
Route::get('/download/file/{id}/', [FileController::class, 'download'])->name('storage.download.file');
Route::post('/change/file-name', [FileController::class, 'changeFileName'])->name('storage.change.file-name');
Route::get('/file/{id}/share', [FileController::class, 'share'])->name('storage.file.share');

Route::get('/folder/{id}/create', [FolderController::class, 'create'])->name('storage.folder.create');
Route::get('/folder/{id}/delete', [FolderController::class, 'delete'])->name('storage.folder.delete');
// Files
// Route::post('/storage/add/file',[])

// REST API
// Route::get('/user/get', [UserController::class, 'get']);
