<?php

namespace App\Http\Controllers;

use App\Models\Product; // CALL THE MODEL
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts()
    {
        // Fetch all products
        $products = Product::all(); // TO GET THE MODEL AND COLLECT ALL DATA

        // Pass products to the view
        return view('product', compact('products')); // RETURN ALL DATA AS PRODUCTS INTO PRODUCT PAGE
    }
}
