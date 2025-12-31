<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// PUBLIC
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/about', fn() => view('user.about'))->name('about');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);

// AUTH
Route::middleware('auth')->group(function () {
    // DASHBOARD
    Route::get('dashboard',action: function (){return view('dashboard');})->name('dashboard');
    
    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ROLE USER
    Route::middleware('role:user')->group(function () {
        Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy']);
        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store');
    });

    // ROLE ADMIN
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('books', BookController::class)->except('index');
        Route::get('books', [BookController::class, 'adminIndex'])->name('books.adminIndex');
        Route::resource('categories', CategoryController::class);
        Route::get('transactions', [TransactionController::class, 'adminIndex'])->name('transactions.index');
        Route::patch('transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
        Route::resource('users', UserController::class);
        Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    });

});

require __DIR__ . '/auth.php';
