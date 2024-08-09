<?php

namespace App\Actions\Auth;

use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateToken
{
    use AsAction;

    public function handle(User $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;

    }
}
