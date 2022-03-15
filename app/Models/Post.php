<?php

namespace App\Models;

use App\Models\Traits\IdTrait;
use App\Models\Traits\TimestampTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use IdTrait;
    use TimestampTrait;

    private function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments(): Collection
    {
        return $this->comments()->get();
    }

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

    public function setAuthor(User $user): void
    {
        $this->author = $user->getId();
    }

    public function getCommentsCount(): int
    {
        return $this->comments()->get()->count();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getAbbreviatedContent(): string
    {
        return implode(" ", [
            substr($this->getContent(),0, 50),
            '. . .',
        ]);
    }

}
