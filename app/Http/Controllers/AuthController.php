<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class AuthController extends Controller
{
    /**
     * Handle the login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'custEmail' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Find the customer by email
        $customer = Customer::where('custEmail', $request->custEmail)->first();
    
        // Check if the customer exists and compare the passwords
        if ($customer && trim($request->password) === trim($customer->password)) {
            // Passwords match, log the customer in
            Auth::guard('customer')->login($customer);
    
            // Redirect to the home page or dashboard
            return redirect()->route('home');
        }
    
        // If the login attempt fails, redirect back with an error message
        return redirect()->back()->withErrors([
            'custEmail' => 'The provided credentials do not match our records.',
        ]);
    }
    
    
    /**
     * Handle the logout request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function register(Request $request)
    {
        try {
            // Validate the incoming request
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
'custEmail' => 'required|email|unique:customers,custEmail',
                'password' => 'required|min:6|confirmed',
            ]);
    
            // Check if the email already exists
            $existingCustomer = Customer::where('custEmail', $request->custEmail)->first();
    
            if ($existingCustomer) {
                // Return an error if the email already exists
                return redirect()->back()->withErrors(['custEmail' => 'The email is already registered.']);
            }
    
            // Store the data using the stored procedure
            $firstName = $request->first_name;
            $lastName = $request->last_name;
            $email = $request->custEmail;
            $password = $request->password;
    
            // Calling the stored procedure
            DB::statement('
                CALL customer_register(?, ?, ?, ?)', [
                $firstName,  // p_firstName
                $lastName,   // p_lastName
                $email,      // p_email
                $password    // p_password
            ]);
    
            // Find the customer using the email and log them in
            $customer = Customer::where('custEmail', $email)->first();
    
            // Log the customer in after successful registration
            Auth::guard('customer')->login($customer);
    
            // Redirect to home page after successful registration
            return redirect()->route('home')->with('status', 'Registration successful! Welcome ' . $customer->customerName);
        } catch (\Exception $e) {
         
    
            // Optionally, you can display more detailed errors in the response
            return redirect()->back()->withErrors(['msg' => 'There was an error during registration. Please try again.']);
        }
    }
    public function home()
    {
        // Get the authenticated customer
        $customer = Auth::guard('customer')->user();
    
        // Check if the customer is logged in and exists
        if ($customer) {
            // Retrieve the customer details using customerID
            $customerData = Customer::where('customerID', $customer->customerID)->first();
    
            // Pass the first name to the view if customerData is found
            if ($customerData) {
                $fullName = $customerData->customerName;
                $firstName = explode(' ', $fullName)[0]; // Get the first part of the name
                return view('home', ['firstName' => $firstName]);
            }
        }
    
        // If not authenticated or customer data not found, pass a default value
        return view('home', ['firstName' => '']);
    }
    
    

    

}

    
