<?php

namespace App\Hydrators;

use App\Models\Post;

class CreatePostHydrator
{
    public static function hydrate(array $data): Post
    {
        $post =  new Post();
        $post->setTitle(htmlspecialchars($data['title']));
        $post->setContent(htmlspecialchars($data['content']));
        $post->setAuthor($data['author']);

        return $post;
    }
}
