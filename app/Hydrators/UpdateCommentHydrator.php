<?php

namespace App\Hydrators;

use App\Models\Comment;

class UpdateCommentHydrator
{
    public static function hydrate(Comment $comment, array $data): Comment
    {
        $comment->setContent(htmlspecialchars($data['content']));

        return $comment;
    }
}
