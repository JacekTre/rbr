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

    public function getAuthor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPost(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
