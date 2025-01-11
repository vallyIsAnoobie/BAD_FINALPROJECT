<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController; // Ensure this is imported

// Set the default route to display the splashscreen view
Route::get('/', function () {
    return view('splashscreen');
});

// Product Routing
Route::get('/products', [ProductController::class, 'showProducts']);

// Order Routing
Route::get('/order-summary/{orderId}', [OrderController::class, 'showOrderSummary']);

// Customer Routing
Route::get('/login', function () {
    return view('login'); // Login view
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/signup', function () {
    return view('signup'); // Signup view
})->name('signup');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');
