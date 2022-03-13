<?php

namespace App\Models;

use App\Models\Traits\IdTrait;
use App\Models\Traits\TimestampTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use IdTrait;
    use TimestampTrait;

    public function getComments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getAuthor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
