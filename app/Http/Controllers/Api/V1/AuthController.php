<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Auth\LogoutUser;
use App\Actions\Auth\StoreUser;
use App\Http\Controllers\Controller;
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
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = StoreUser::run($validatedData);

        return response()->json([
            'message' => 'Successfully created user!',
            'user' => $user,
        ], 201);

    }

    public function logout(Request $request): JsonResponse
    {
        // logout action
        LogoutUser::run($request);

        // return success response
        return $this->success('Logged out successfully.');

    }
}
