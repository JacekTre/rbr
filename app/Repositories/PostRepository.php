<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository
{
    public function getAll(int $pageSize): ?LengthAwarePaginator
    {
        return Post::paginate($pageSize);
    }

    public function getById(int $postId): ?Post
    {
        return Post::find($postId);
    }
}
