<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages', [MessageController::class, 'store']);

Route::get('admin/books', [BookController::class, 'index']);
Route::get('admin/books/{id}', [BookController::class, 'show']);
