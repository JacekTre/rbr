<?php

namespace App\Service;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
{
    public const PAGE_SIZE = 15;

    private PostRepository $posts;

    public function __construct(
        PostRepository $posts
    ) {
        $this->posts = $posts;
    }

    public function getAll(): ?LengthAwarePaginator
    {
        return $this->posts->getAll(self::PAGE_SIZE);
    }

    public function getById(int $id): ?Post
    {
        return $this->posts->getById($id);
    }
}
