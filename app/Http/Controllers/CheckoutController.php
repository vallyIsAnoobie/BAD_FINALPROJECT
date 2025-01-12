<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        // Set shoppingCartID to 'SC000' for testing
        $shoppingCartID = 'SC004';

        // Fetch the shopping cart using the fixed 'SC000' ID, along with shoppingCartDetails
        $shoppingCart = ShoppingCart::with('shoppingCartDetails')->where('shoppingCartID', $shoppingCartID)->first();

        // Check if the shopping cart exists
        if (!$shoppingCart) {
            // Show the shoppingcart view if the cart is not found
            return view('shoppingcart');
        }

        // Return the checkout view with the shopping cart data, including shoppingCartDetails
        return view('checkout', compact('shoppingCart'));
    }
}
