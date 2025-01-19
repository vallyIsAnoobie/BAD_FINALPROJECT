<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChristmasBurroController extends Controller
{
    // Assuming you already have a method to show the cart
    public function showMenu2()
    {
        // Get the customer's ID from the session
        $customerID = session('customerID');
        
        if (!$customerID) {
            // Handle case where customerID is not in session (maybe redirect to login page)
            return redirect()->route('login');
        }
        
        // Get the shoppingCartID from the session
        $shoppingCartID = session('shoppingCartID');
        
        if (!$shoppingCartID) {
            // Handle case where shoppingCartID is not in session
            return redirect()->route('some.error.route'); // Define where to redirect or what to do
        }
    
        
        return view('christmasburro');
    }
    
    // Method to handle adding product to the cart
    public function addToCart(Request $request)
    {
        // Get the customer cart ID from session
        $shoppingCartID = session('shoppingCartID');
        
        // Get product details from the request
        $productID = $request->input('productID');  // The ID of the product being added
        $quantity = $request->input('quantity', 1);  // Default to 1 if no quantity is provided
        
        // Insert the product into the shopping cart details table
        DB::table('shoppingcartdetails')->insert([
            'shoppingCartID' => $shoppingCartID,
            'productID' => $productID,
            'quantity' => $quantity,
            'cartdetails_id' => $this->generateDetailID(), // Generate a unique detail ID
        ]);
        if (!$shoppingCartID) {
            // Handle the case where the shoppingCartID is not set in the session
            return redirect()->route('error.page');  // Redirect or show an error
        }
        
        
        // Redirect back or show a success message
        return redirect()->route('shoppingcart'); // Or wherever you want to redirect
    }



    // Helper method to generate a unique detail ID for each cart detail
    private function generateDetailID()
    {
        // Get the highest cartdetails_id from the shoppingcartdetails table
        $lastDetailID = DB::table('shoppingcartdetails')
                         ->orderBy('cartdetails_id', 'desc')
                         ->value('cartdetails_id');
    
        // If there are no records, start with 'DI0001'
        if (!$lastDetailID) {
            return 'DI0001';
        }
    
        // Extract the numeric part from the last detailID (e.g., 'DI0001' -> 1)
        $lastNumber = (int) substr($lastDetailID, 2); // Remove 'DI' prefix and convert to int
    
        // Increment the number
        $newNumber = $lastNumber + 1;
    
        // Format the new number with leading zeros
        return 'CD' . str_pad($newNumber, 3, '0', STR_PAD_LEFT); // Pad with leading zeros to make it 4 digits
    }
}
