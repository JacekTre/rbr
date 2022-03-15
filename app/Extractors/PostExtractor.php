<?php

namespace App\Extractors;

use App\Models\Post;

class PostExtractor
{
    public static function extract(?Post $post): array
    {
        if (! $post instanceof Post) {
            return [];
        }

        return [
            'id' => $post->getId(),
            'author' => UserExtractor::extract($post->getAuthor()),
            'title' => $post->getTitle(),
            'content' => $post->getContent(),
            'comments' => self::prepareComments($post),
            'createdAt' => $post->getCreatedAt(),
            'updatedAt' => $post->getUpdatedAt(),
        ];
    }

    private static function prepareComments(Post $post): array
    {
        $comments = $post->getComments();
        if (count($comments) < 1) {
            return [];
        }

        $extractComments = [];
        foreach ($comments as $comment) {
            $extractComments[] = CommentExtractor::extract($comment);
        }

        return $extractComments;
    }
}
