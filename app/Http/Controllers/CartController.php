<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart; // Assuming you have a ShoppingCart model
use App\Models\ShoppingCartDetails; // Assuming you have a ShoppingCartDetails model
use App\Models\Product; // Assuming you have a Product model
use Illuminate\Support\Facades\DB; // For using DB facade to query the database
use Illuminate\Support\Facades\Log; // For logging purposes
use Illuminate\Validation\Rule; // For validation rules

class CartController extends Controller
{
    /**
     * Show the shopping cart.
     */
    public function showCart()
    {
        $firstName = session('firstName', 'Login');  // Default name if not found

        return view('shoppingCart', ['firstName' => $firstName]);
    }
    

    /**
     * Show the shopping cart and its details.
     */
    public function showShoppingCart($shoppingCartId)
    {
        // Fetch the shopping cart based on the cart ID (assumed to be a unique identifier for the cart)
        $shoppingCart = ShoppingCart::findOrFail($shoppingCartId);

        // Fetch shopping cart details, joining the product table to get product name and image
        $shoppingCartDetails = DB::table('shoppingCartDetails')
            ->join('product', 'shoppingCartDetails.productID', '=', 'product.productID')  // JOIN products on product_id
            ->where('shoppingCartDetails.shoppingCartID', '=', $shoppingCartId)  // Filter by cart ID
            ->select('shoppingCartDetails.*', 'product.productName', 'product.productID', 'product.productPrice', 'product.productImage')  // Select necessary columns
            ->get();

        // Calculate total items and total price
        $totalItems = $shoppingCartDetails->sum('quantity');
        $totalPrice = $shoppingCartDetails->sum(function ($detail) {
            return $detail->quantity * $detail->productPrice;
        });

        // Return the view with the necessary data
        return view('shoppingCart', compact('shoppingCart', 'shoppingCartDetails', 'totalItems', 'totalPrice'));
    }

    /**
     * Update the shopping cart.
     */
    public function updateCart(Request $request)
    {
        Log::info('Update Cart Request:', $request->all());
        
        // Validate the request
        $request->validate([
            'action' => 'required|in:increase,decrease',
            'detail_id' => 'required|exists:shoppingCartDetails,detailID',
        ]);

        // Fetch the cart detail
        $shoppingCartDetails = DB::table('shoppingCartDetails')->select('detailID', 'quantity', 'shoppingCartID')->where('detailID', $request->detail_id)->first();

        if (!$shoppingCartDetails) {
            return redirect()->back()->with('error', 'Cart detail not found.');
        }

        // Determine action (increase or decrease)
        if ($request->action === 'increase') {
            DB::table('shoppingCartDetails')->where('detailID', $request->detail_id)->increment('quantity', 1);
        } elseif ($request->action === 'decrease') {
            // Ensure the quantity doesn't go below 1
            if ($shoppingCartDetails->quantity > 1) {
                DB::table('shoppingCartDetails')->where('detailID', $request->detail_id)->decrement('quantity', 1);
            } else {
                return redirect()->back()->with('error', 'Cannot reduce quantity below 1.');
            }
        }

        // Recalculate the totalItems for the shopping cart
        $totalItems = DB::table('shoppingCartDetails')
            ->where('shoppingCartID', $shoppingCartDetails->shoppingCartID)
            ->sum('quantity');

        // Update the totalItems column in the shoppingCart table
        DB::table('shoppingCart')
            ->where('shoppingCartID', $shoppingCartDetails->shoppingCartID)
            ->update(['totalItems' => $totalItems]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Cart updated successfully.');
    }
}
