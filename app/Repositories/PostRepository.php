<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository
{
    public function getAllPaginate(int $pageSize): ?LengthAwarePaginator
    {
        return Post::paginate($pageSize);
    }

    public function getAll(): ?Collection
    {
        return Post::all();
    }

    public function getById(int $postId): ?Post
    {
        return Post::find($postId);
    }

    public function countAllPosts(): int
    {
        return Post::all()->count();
    }
}
