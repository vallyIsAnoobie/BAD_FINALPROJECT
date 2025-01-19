<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Show the shopping cart.
     */
    public function showShoppingCart()
    {
        // Retrieve the customerID and firstName from session
        $customerID = session('customerID');
        $firstName = session('firstName', 'Login');

        // Check if customerID exists in session
        if (!$customerID) {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }

        // Fetch the customer using the customerID
        $customer = Customer::where('customerID', $customerID)->first();

        // Ensure the customer exists
        if (!$customer) {
            return redirect()->route('login')->with('error', 'Customer not found.');
        }

        // Fetch the shopping cart based on the customer's shoppingCartID
        $shoppingCart = DB::table('shoppingCart')
            ->where('customerID', $customer->customerID)
            ->first();

        // Prepare an empty shopping cart if none exists
        if (!$shoppingCart) {
            $shoppingCartDetails = collect(); // Empty collection
        } else {
            // Fetch shopping cart details for the specific shoppingCartID
            $shoppingCartDetails = DB::table('shoppingCartDetails')
                ->join('product', 'shoppingCartDetails.productID', '=', 'product.productID')
                ->where('shoppingCartDetails.shoppingCartID', '=', $shoppingCart->shoppingCartID)
                ->select('shoppingCartDetails.*', 'product.productName', 'product.productID', 'product.productPrice', 'product.productImage')
                ->get();

            foreach ($shoppingCartDetails as $detail) {
                $detail->productImage = $detail->productImage ? base64_encode($detail->productImage) : 'default-image-base64-string';
            }
        }

        // Check if the cart is empty
        $isCartEmpty = $shoppingCartDetails->isEmpty();

        // Calculate total items and total price
        $totalItems = $shoppingCartDetails->sum('quantity');
        $totalPrice = $shoppingCartDetails->sum(function ($detail) {
            return $detail->quantity * $detail->productPrice;
        });

        // Return the view with the necessary data
        return view('shoppingCart', compact('shoppingCart', 'shoppingCartDetails', 'totalItems', 'totalPrice', 'firstName', 'isCartEmpty'));
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
        $shoppingCartDetails = DB::table('shoppingCartDetails')
            ->select('detailID', 'quantity', 'shoppingCartID')
            ->where('detailID', $request->detail_id)
            ->first();

        if (!$shoppingCartDetails) {
            return redirect()->back()->with('error', 'Cart detail not found.');
        }

        // Determine action (increase or decrease)
        if ($request->action === 'increase') {
            DB::table('shoppingCartDetails')
                ->where('detailID', $request->detail_id)
                ->increment('quantity', 1);
        } elseif ($request->action === 'decrease') {
            // Ensure the quantity doesn't go below 1
            if ($shoppingCartDetails->quantity > 1) {
                DB::table('shoppingCartDetails')
                    ->where('detailID', $request->detail_id)
                    ->decrement('quantity', 1);
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
    public function showCart(Request $request)
{
    // Assuming you fetch the shopping cart data here
    $customer = Auth::guard('customer')->user();

    if (!$customer) {
        return redirect()->route('login')->withErrors(['msg' => 'You need to be logged in to view the cart.']);
    }

    $shoppingCart = DB::table('shoppingCart')
        ->where('customerID', $customer->customerID)
        ->first();

    if (!$shoppingCart) {
        return redirect()->back()->withErrors(['msg' => 'Your cart is empty.']);
    }

    // Fetch the shopping cart details
    $shoppingCartDetails = DB::table('shoppingCartDetails')
        ->join('product', 'shoppingCartDetails.productID', '=', 'product.productID')
        ->where('shoppingCartDetails.shoppingCartID', '=', $shoppingCart->shoppingCartID)
        ->select('shoppingCartDetails.*', 'product.productName', 'product.productID', 'product.productPrice', 'product.productImage')
        ->get();

    // Store the cart data in the session
    session()->put('shoppingCartDetails', $shoppingCartDetails);

    // Pass the shopping cart data to the view
    return view('cart.show', ['shoppingCartDetails' => $shoppingCartDetails]);
}

}
