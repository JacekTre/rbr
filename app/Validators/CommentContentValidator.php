<?php

namespace App\Validators;

use Illuminate\Contracts\Validation\Rule;

class CommentContentValidator implements Rule
{
    public function passes($attribute, $value): bool
    {
        if (is_string($value) && strlen($value) < 50) {
            return true;
        }
    }

    public function message(): string
    {
        return 'Incorrect comment content!';
    }
}
