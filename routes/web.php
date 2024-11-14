<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Main entry route
Route::middleware('auth')->get('/', [BookController::class, 'index'])->name('home');

// Login route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Books index route
Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::resource('books', BookController::class)->except(['index']);
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
});

// Categories resource route
Route::resource('categories', CategoryController::class)->except(['show', 'edit']);

// Auth and logout routes
Auth::routes();
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
