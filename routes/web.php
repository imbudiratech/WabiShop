<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==============================
// AUTH ROUTES
// ==============================

// Show Register Page
Route::get('/register', function () {
    return view('register');
})->middleware('guest');

// Handle Register Form
Route::post('/register', [UserController::class, 'register'])->middleware('guest');

// Show Login Page
Route::get('/login', function () {
    return view('login');
})->middleware('guest');

// Handle Login Form
Route::post('/login', [UserController::class, 'login']);

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// ==============================
// PRODUCT ROUTES
// ==============================

// Home page (list all products)
Route::get('/', [PostController::class, 'home']);

// Create Product (Admin only)
Route::post('/create-post', [PostController::class, 'createPost'])->middleware('auth');


// ==============================
// ORDER ROUTES
// ==============================

Route::middleware('auth')->group(function () {

    // Submit an order
    Route::post('/order', [OrderController::class, 'store'])->name('orders.store');

    // View order history
    Route::get('/orders', [OrderController::class, 'home'])->name('orders.home');

    // Cancel an order
    Route::delete('/order', [OrderController::class, 'destroy'])->name('orders.destroy');

    //payment
    Route::get('/pay/{post}', [OrderController::class, 'pay'])->name('orders.pay');

});