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
use App\Http\Controllers\ChristmasBurroController;



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
Route::get('/christmasburro', [ChristmasBurroController::class, 'showMenu2'])->name('christmasburro');

Route::get('/menu', [MenuController::class, 'showMenu'])->name('menu');
Route::get('/order', [OrderController::class, 'showOrderSummary'])->name('order');

Route::get('/shoppingcart', [CartController::class, 'showShoppingCart'])->name('shoppingcart');

Route::post('/shoppingcart', [CartController::class, 'updateCart'])->name('updateCart');

Route::get('/merchandise', [MerchandiseController::class, 'showMerch'])->name('merchandise');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

Route::post('/add-to-cart', [ChristmasBurroController::class, 'addToCart'])->name('addToCart');


Route::get('/', function () {
    return view('splashscreen');
})->name('splashscreen');





