<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CartController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

// Public Routes
Route::get('/login', function () {
    return view('login'); // Login view
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', function () {
    return view('register'); // Signup view
})->name('register');

Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');

// Home route (after login)
Route::get('/home', function () {
    return view('home'); // Adjust 'home' to the actual view name
})->name('home');

Route::get('/menu', [MenuController::class, 'showMenu'])->name('menu');

Route::get('/order', [OrderController::class, 'showOrder'])->name('order');

Route::get('/shoppingcart', [CartController::class, 'showCart'])->name('shoppingcart');



// Test route handled by TestController
// Splashscreen route
Route::get('/', function () {
    return view('splashscreen');
})->name('splashscreen');
