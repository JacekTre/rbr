<?php

namespace App\Service\Command;

use App\Models\User;
use App\Repositories\UserRepository;

class RandomUser
{
    public function get(): User
    {
        $users = new UserRepository();
        $randomUserId = rand(1, $users->countAllUsers());
        return $users->getById($randomUserId);
    }
}
