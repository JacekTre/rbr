<?php

namespace App\Validators;

use Illuminate\Contracts\Validation\Rule;

class PostTitleValidator implements Rule
{
    public function passes($attribute, $value): bool
    {
        if (is_string($value) && strlen($value) < 100) {
            return true;
        }
    }

    public function message(): string
    {
        return 'Invalid post title!';
    }
}
