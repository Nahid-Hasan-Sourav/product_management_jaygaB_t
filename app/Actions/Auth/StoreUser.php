<?php

namespace App\Actions\Auth;

use App\Models\User;
use Exception;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreUser
{
    use AsAction;

    public function handle(array $data): User
    {
        // hash the password
        $data['password'] = bcrypt($data['password']);
        // create the user
        try {
            return User::query()->create($data);
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }
}
