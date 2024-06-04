<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class income extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $user_id = $request->header('user_id');

        if (is_null($user_id))
        {
            return response()->json([
                'message' => 'User ID not found.'
            ], 404);
        }

        $user = User::where('hashed_id', $user_id)->first();

        if (!$user)
        {
            return response()->json([
                'message' => 'Unauthorized access.'
            ], 401);
        }

        $incomes = \App\Models\Income::where('user_id', $user->id)->latest()->get();

        return response()->json([
            'data' => $incomes
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'nullable|date'
        ]);

        if ($validate->fails())
        {
            return response()->json([
                'errors' => $validate->errors()
            ], 400);
        }

        $user_id = $request->header('user_id');

        if (is_null($user_id))
        {
            return response()->json([
                'message' => 'Unauthorized access.'
            ], 401);
        }

        $user = User::where('hashed_id', $user_id)->first();

        if (!$user)
        {
            return response()->json([
                'message' => 'Unauthorized access.'
            ], 401);
        }

        $incomeData = $request->all();
        $incomeData['user_id'] = $user->id;

        \App\Models\Income::create($incomeData);

        return response()->json([
            'message' => 'Income created successfully.'
        ], 200);
    }

}
