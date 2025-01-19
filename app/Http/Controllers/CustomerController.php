<?php

namespace App\Http\Controllers;
use App\Models\ShoppingCart;


use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    // Show the registration and login form
    public function showForm()
    {
        return view('register.blade.php');
    }


    // Handle the registration
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,custEmail',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save customer data without hashing password
        Customer::create([
            'customerName' => $request->first_name . ' ' . $request->last_name,
            'custEmail' => $request->email,
            'password' => $request->password, // Direct storage of password
        ]);

        return redirect()->back()->with('success', 'Registration successful. You can now log in.');
    }

    // Handle login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = Customer::where('custEmail', $request->email)->first();

        // Compare passwords directly
        if ($customer && $request->password === $customer->password) {
            // Simulate login by storing user data in session
            session(['customer' => $customer]);

            return redirect()->back()->with('success', 'Login successful.');
        }

        return redirect()->back()->withErrors(['login' => 'Invalid email or password.'])->withInput();
    }
}

?>