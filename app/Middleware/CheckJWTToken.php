<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Log;

class BasicJWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Skip JWT validation for specific routes (e.g., login, register)
        if ($request->is('login') || $request->is('register')) {
            return $next($request); // Skip JWT check for login/register routes
        }

        // Retrieve the Authorization header
        $authorizationHeader = $request->header('Authorization');

        // Check if Authorization header exists
        if ($authorizationHeader) {
            // Ensure the token is in the correct format (Bearer token)
            if (strpos($authorizationHeader, 'Bearer ') === 0) {
                // Extract the token
                $token = str_replace('Bearer ', '', $authorizationHeader);

                try {
                    // Decode the JWT token using the secret key
                    $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

                    // Log the decoded payload (optional for debugging)
                    Log::info('Decoded JWT Payload:', (array) $decoded);

                    // Add the decoded user info to the request (optional)
                    $request->attributes->add(['user' => $decoded]);

                } catch (\Exception $e) {
                    Log::error('JWT Decoding Error: ' . $e->getMessage());
                    // Optionally handle the error or return an invalid token response
                }
            }
        }

        // Continue with the request
        return $next($request);
    }
}
