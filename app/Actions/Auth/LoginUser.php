<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginUser
{
    use AsAction;

    public function handle(): void {}

    public function rules(): array
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function asController(ActionRequest $request)
    {
        $data = $request->validated();
        //fetch user
        $user = User::where('email', $data['email'])
            ->first();

        //  check if user exists
        if (blank($user)) {
            throw ValidationException::withMessages([
                'field' => 'User not found',
            ]);
        }
        // check if password is correct
        if (! Hash::check($data['password'], $user->password)) {
            abort(401, 'Invalid credentials');
        }
        //  create token
        $token = CreateToken::run($user);

        // return success response with user and token
        return response()->json([
            'message' => 'login success',
            'statusCode' => 200,
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
        ], 200);
    }
}
