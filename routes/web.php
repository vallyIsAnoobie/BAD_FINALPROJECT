<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('splashscreen');
});

// Route::get('/product', function () {
//     return view('product');
// });

//Product Routing
Route::get('/products', [ProductController::class, 'showProducts']);

//Order Routing
Route::get('/order-summary/{orderId}', [OrderController::class, 'showOrderSummary']);

//Customer Routing
Route::get('/register', [CustomerController::class, 'showRegisterForm'])->name('customer.register.form');
Route::post('/register', [CustomerController::class, 'register'])->name('customer.register');