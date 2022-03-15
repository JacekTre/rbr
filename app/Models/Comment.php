<?php

namespace App\Models;

use App\Models\Traits\IdTrait;
use App\Models\Traits\TimestampTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    use IdTrait;
    use TimestampTrait;

    private function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function getAuthor(): ?User
    {
        $user = $this->author()->first();
        if ($user instanceof User) {
            return $user;
        }

        return null;
    }

    private function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function getPost(): object
    {
        return $this->post()->first();
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
