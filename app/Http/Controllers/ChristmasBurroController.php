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
        
        // Retrieve the existing shopping cart ID from the database for the logged-in customer
        $shoppingCartID = DB::table('shoppingcart')
            ->where('customerID', $customerID)
            ->value('shoppingCartID');  // This retrieves the shoppingCartID directly
        
        // If no shoppingCartID is found, create a new one
        if (!$shoppingCartID) {
            $shoppingCartID = $this->createNewCart($customerID); // Create a new cart
        }

        // Store the shoppingCartID in the session
        session(['shoppingCartID' => $shoppingCartID]);
        
        // Get the customer's cart items (e.g., for display purposes)
        $shoppingCartItems = DB::table('shoppingcartdetails')
            ->where('shoppingCartID', $shoppingCartID)
            ->get();
        
        return view('christmasburro', ['shoppingCartItems' => $shoppingCartItems]);
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
            'detailID' => $this->generateDetailID(), // Optionally generate a unique detail ID
        ]);
        
        // Redirect back or show a success message
        return redirect()->route('shoppingCart.show'); // Or wherever you want to redirect
    }

    // Helper method to create a new shopping cart
    private function createNewCart($customerID)
    {
        // Generate a unique shoppingCartID for the new cart
        $shoppingCartID = 'SC' . uniqid();
        
        // Insert the new shopping cart into the database
        DB::table('shoppingcart')->insert([
            'shoppingCartID' => $shoppingCartID,
            'customerID' => $customerID,
        ]);
        
        return $shoppingCartID;
    }

    // Helper method to generate a unique detail ID for each cart detail (optional)
    private function generateDetailID()
    {
        // Get the highest detailID from the shoppingcartdetails table
        $lastDetailID = DB::table('shoppingcartdetails')
                         ->orderBy('detailID', 'desc')
                         ->value('detailID');
        
        // If there are no records, start with 'CD001'
        if (!$lastDetailID) {
            return 'CD001';
        }
    
        // Extract the numeric part from the last detailID
        $lastNumber = (int) substr($lastDetailID, 2); // Remove 'CD' and convert to int
        
        // Increment the number
        $newNumber = $lastNumber + 1;
        
        // Format the new number with leading zeros
        return 'CD' . str_pad($newNumber, 3, '0', STR_PAD_LEFT); // Pad with leading zeros to make it 3 digits
    }    
}
