<?php

declare(strict_types=1);

namespace App\Http\Processes;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class RegisterProcess
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data): User
    {
        return $this->userRepository->create($data);
    }
}
