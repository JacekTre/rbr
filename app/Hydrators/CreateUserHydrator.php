<?php

namespace App\Hydrators;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserHydrator
{
    public static function hydrate(array $data): User
    {
        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setPassword(Hash::make($data['password']));

        return $user;
    }
}
