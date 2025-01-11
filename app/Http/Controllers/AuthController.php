<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Assuming you're using the default User model

class AuthController extends Controller
{
    /**
     * Handle user registration (sign up).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // Ensure password confirmation
        ]);

        // Create the user with a hashed password
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Automatically log in the user after successful signup
        Auth::login($user);

        // Return a response (could redirect to a home page or a success message)
        return redirect()->route('home');
    }

    /**
     * Handle user login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Successful login
            return redirect()->route('home');
        }

        // Failed login, return with error
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }



    /**
     * A protected home route (only accessible after login).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function home()
    {
        // Access the authenticated user
        $user = Auth::user();

        return response()->json([
            'message' => 'Welcome to the home page!',
            'user' => $user
        ]);
    }
}
