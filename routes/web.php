<?php
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;



/*
|----------------------------------------------------------------------|
| Web Routes                                                           |
|----------------------------------------------------------------------|
*/
Route::get('/login', function () {
    return view('login'); // Login view
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Show the registration page (signup form)
Route::get('/register', function () {
    return view('register'); // Adjust the view path if needed
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/home', function () {
    return view('home'); // Home page view
})->name('home');
Route::get('/home', [AuthController::class, 'home'])->name('home');


Route::get('/menu', [MenuController::class, 'showMenu'])->name('menu');
Route::get('/order', [OrderController::class, 'showOrder'])->name('order');
Route::get('/shoppingcart', [CartController::class, 'showCart'])->name('shoppingcart');
Route::get('/merchandise', [MerchandiseController::class, 'showMerch'])->name('merchandise');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout');

// Test route handled by TestController
Route::get('/', function () {
    return view('splashscreen');
})->name('splashscreen');
