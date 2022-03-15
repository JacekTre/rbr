<?php

namespace App\Extractors;

use App\Models\Comment;

class CommentExtractor
{
    public static function extract(?Comment $comment): array
    {
        if (! $comment instanceof Comment) {
            return [];
        }

        return [
            'id' => $comment->getId(),
            'author' => UserExtractor::extract($comment->getAuthor()),
            'content' => $comment->getContent(),
            'createdAt' => $comment->getCreatedAt(),
            'updatedAt' => $comment->getUpdatedAt(),
        ];
    }
}
