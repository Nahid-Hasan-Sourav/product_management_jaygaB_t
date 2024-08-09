<?php

namespace App\Http\Controllers;

use App\Actions\Auth\StoreUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {

        // validate the request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);


        $user = StoreUser::run($validatedData);

        return response()->json([
            'message' => 'Successfully created user!',
            'user' => $user,
        ], 201);

    }
}
