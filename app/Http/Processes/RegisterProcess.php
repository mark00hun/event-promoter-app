<?php

declare(strict_types=1);

namespace App\Http\Processes;

use App\Models\User;

class RegisterProcess
{
    public function createUser(array $data): User
    {
        // TODO UserRepository
        return User::create($data);
    }
}
