<?php

namespace App\Service\Api;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostService
{
    private PostRepository $posts;

    public function __construct(
        PostRepository $posts
    ) {
        $this->posts = $posts;
    }

    public function getAll(): Collection
    {
        return $this->posts->getAll();
    }

    public function getById(int $id): ?Post
    {
        return $this->posts->getById($id);
    }
}
