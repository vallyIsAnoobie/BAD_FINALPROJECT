<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Verify the validity of a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkToken(Request $request)
    {
        try {
            // Attempt to parse the token and authenticate the user
            $user = JWTAuth::parseToken()->authenticate();
            
            return response()->json([
                'message' => 'Token is valid',
                'user' => $user
            ]);
        } catch (\Exception $e) {
            // Handle invalid or expired token
            return response()->json(['error' => 'Token is invalid or expired'], 401);
        }
    }

    /**
     * Handle user login and return JWT token.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the request (ensure email and password are provided)
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful, generate the token
            $user = Auth::user();
            $token = JWTAuth::fromUser($user);

            // Redirect to the home page with the token
            return redirect()->route('home')->with('token', $token);
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
    }

    /**
     * Handle user logout by invalidating the token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'Logout successful']);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not log out'], 500);
        }
    }

    /**
     * Protected route to demonstrate authentication.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function home()
    {
        // Access user attached by middleware
        $user = request()->get('user');
        return response()->json([
            'message' => 'Welcome to the home page!',
            'user' => $user
        ]);
    }
}
