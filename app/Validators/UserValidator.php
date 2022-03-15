<?php

namespace App\Validators;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Validation\Rule;

class UserValidator implements Rule
{
    public function passes($attribute, $value): bool
    {
        $users = new UserRepository();
        $user = $users->getById((int)$value);

        if ($user instanceof User) {
            return true;
        }
    }

    public function message(): string
    {
        return 'User does not exist!';
    }
}
