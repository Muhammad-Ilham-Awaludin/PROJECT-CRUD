<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

// Route::resource('books', BookController::class);
// Route::resource('books', BookController::class);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home.page');

Route::prefix('/books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::post('/store', [BookController::class, 'store'])->name('store');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [BookController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [BookController::class, 'update'])->name('update');
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('destroy');
});

Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});