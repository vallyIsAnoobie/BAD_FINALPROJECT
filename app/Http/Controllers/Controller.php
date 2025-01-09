<?php

namespace App\Http\Controllers;
use App\Models\Product;

abstract class Controller
{
    public function showProducts()
    {
        // Fetch all products
        $products = Product::all();

        // Pass products to the view
        return view('product', compact('product'));
    }
}
