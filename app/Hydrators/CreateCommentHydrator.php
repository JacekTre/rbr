<?php

namespace App\Hydrators;

use App\Models\Comment;

class CreateCommentHydrator
{
    public static function hydrate(array $data): Comment
    {
        $comment = new Comment();
        $comment->setContent(htmlspecialchars($data['content']));
        $comment->setAuthor($data['author']);
        $comment->setPost($data['post']);

        return $comment;
    }
}
