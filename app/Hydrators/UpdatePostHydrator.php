<?php

namespace App\Hydrators;

use App\Models\Post;

class UpdatePostHydrator
{
    public static function hydrate(Post $post, array $data): Post
    {
        $post->setTitle(htmlspecialchars($data['title']));
        $post->setContent(htmlspecialchars($data['content']));

        return $post;
    }
}
