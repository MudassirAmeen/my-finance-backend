<?php

namespace App\Http\Controllers;

use App\Models\loginToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class user extends Controller
{
    /**
     * A method to register the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|same:confirmPassword',
            'confirmPassword' => 'required|string|min:8'
        ]);

        if ($validate->fails())
        {
            return response()->json([
                'errors' => $validate->errors()
            ], 400);
        }

        try
        {
            $user = \App\Models\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        } catch (\Throwable $th)
        {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * A method to login the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if ($validate->fails())
        {
            return response()->json([
                'errors' => $validate->errors()
            ], 400);
        }

        try
        {
            $user = \App\Models\User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password))
            {
                return response()->json([
                    'message' => 'Invalid credentials'
                ], 401);
            }

            $token = $this->createNewToken($user->id);

            return response()->json([
                'user' => $user,
                'token' => $token,
                'message' => 'Logged in successfully'
            ], 200);
        } catch (\Throwable $th)
        {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Create a token for a loged in user
     */
    protected function createNewToken(string $user_id)
    {
        // Delete the previous token for that user
        loginToken::where('user_id', $user_id)->delete();

        // Create a random mixed string
        $token = bin2hex(random_bytes(50));
        loginToken::create([
            'user_id' => $user_id,
            'token' => $token
        ]);
        return $token;
    }
}
