<?php

namespace App\Validators;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Contracts\Validation\Rule;

class PostValidator implements Rule
{
    public function passes($attribute, $value): bool
    {
        $posts = new PostRepository();
        $post = $posts->getById((int)$value);

        if ($post instanceof Post) {
            return true;
        }
    }

    public function message(): string
    {
        return 'Post does not exist!';
    }
}
