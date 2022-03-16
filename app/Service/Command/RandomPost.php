<?php

namespace App\Service\Command;

use App\Models\Post;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;

class RandomPost
{
    public function get(): Post
    {
        $posts = new PostRepository();
        $post = null;

        while (! $post instanceof Post) {
            $randomPostId = rand(1, $posts->countAllPosts());
            $post = $posts->getById($randomPostId);
        }

        return $post;
    }
}
