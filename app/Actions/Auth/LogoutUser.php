<?php

namespace App\Actions\Auth;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class LogoutUser
{
    use AsAction;

    public function handle(Request $request): void
    {
        $request->user()->currentAccessToken()->delete();
        // check if the request has all query parameter
        if ($request->has('all')) {
            $request->user()->tokens()->delete();
        }
    }
}
