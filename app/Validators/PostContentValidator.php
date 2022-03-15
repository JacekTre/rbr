<?php

namespace App\Validators;

use Illuminate\Contracts\Validation\Rule;

class PostContentValidator implements Rule
{
    public function passes($attribute, $value): bool
    {
        if (is_string($value) && strlen($value) < 255) {
            return true;
        }
    }

    public function message(): string
    {
        return 'Invalid content title!';
    }
}
