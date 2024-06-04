<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Find the user According
        $user = User::where('hashed_id', $request->header('user_id'))->first();
        if (!$user) {
            return response()->json([
                'message' => 'User Not Found'
            ], 404);
        }
        $loggedInToken = $user->token->token;
        if ($loggedInToken != $request->header('token')) {
            return response()->json([
                'message' => 'Invalid Token!'
            ], 401);
        }
        return $next($request);
    }
}
