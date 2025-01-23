<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/messages', [MessageController::class, 'index']);
Route::post('/messages', [MessageController::class, 'store']);



// Route　constraints
//Route::get('admin/books/{id}', [BookController::class, 'show'])
//    ->whereNumber('id');

// Route Name
//Route::get('admin/books', [BookController::class, 'index'])
//    ->name('books.index');
//Route::get('admin/books/{id}', [BookController::class, 'show'])
//    ->whereNumber('id')
//    ->name('books.show');

// Route GROUP
//Route::prefix('admin/books')->group(function () {
//    Route::get('', [BookController::class, 'index'])
//        ->name('books.index');
//    Route::get('{id}', [BookController::class, 'show'])
//        ->whereNumber('id')
//        ->name('books.show');
//});

Route::prefix('admin/books')
    ->name('books.')
    ->controller(BookController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('{id}', 'show')
            ->whereNumber('id')->name('show');
        Route::get('create', 'create')->name('create');
        Route::post('', 'store')->name('store');
    });

