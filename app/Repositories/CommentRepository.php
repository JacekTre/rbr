<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository
{
    public function getAll(): ?Collection
    {
        return Comment::all();
    }

    public function getById(int $id): ?Comment
    {
        return Comment::find($id);
    }
}
