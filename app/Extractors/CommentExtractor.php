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
            'postId' => $comment->getPost()->getId(),
            'content' => $comment->getContent(),
            'createdAt' => $comment->getCreatedAt()->format('d-m-Y H:i:s'),
            'updatedAt' => $comment->getUpdatedAt()->format('d-m-Y H:i:s'),
        ];
    }
}
