<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Order;
use App\Models\ShoppingCart;

class CheckoutController extends Controller
{
    /**
     * Handle the checkout process.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {
        // Check if the user is authenticated
        $customer = Auth::guard('customer')->user();
    
        if (!$customer) {
            return redirect()->route('login')->withErrors(['msg' => 'You need to be logged in to checkout.']);
        }
    
        // Retrieve the shopping cart data from the session
        $shoppingCartDetails = session()->get('shoppingCartDetails', []);
    
        // Check if the cart is empty
        if (empty($shoppingCartDetails)) {
            return redirect()->route('cart.show')->withErrors(['msg' => 'Your cart is empty.']);
        }
    
        // Calculate total items and total price
        $totalItems = array_sum(array_column($shoppingCartDetails, 'quantity'));
        $totalPrice = array_sum(array_map(function ($detail) {
            return $detail->quantity * $detail->productPrice;
        }, $shoppingCartDetails));
    
        // Pass the shopping cart details and total price to the view
        return view('checkout', [
            'shoppingCartDetails' => $shoppingCartDetails,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
        ]);
    }
    
}    