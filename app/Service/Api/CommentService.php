<?php

namespace App\Service\Api;

use App\Hydrators\CreateCommentHydrator;
use App\Hydrators\UpdateCommentHydrator;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CommentService
{
    private CommentRepository $comments;

    private UserRepository $users;

    private PostRepository $posts;

    public function __construct(
        CommentRepository $comments,
        UserRepository $users,
        PostRepository $posts
    ) {
        $this->comments = $comments;
        $this->users = $users;
        $this->posts = $posts;
    }

    public function getAll(): Collection
    {
        return $this->comments->getAll();
    }

    public function getById(int $id): ?Comment
    {
        return $this->comments->getById($id);
    }

    public function updateComment(Comment $comment, Request $request): Comment
    {
        $commentData = [
            'content' => $request->get('content')
        ];

        $updatedComment = UpdateCommentHydrator::hydrate($comment, $commentData);
        $updatedComment->save();

        return $updatedComment;
    }

    public function createComment(Request $request): Comment
    {
        $newCommentData = [
            'content' => $request->get('content'),
            'author' => $this->users->getById((int)$request->get('authorId')),
            'post' => $this->posts->getById((int)$request->get('postId')),
        ];

        $comment = CreateCommentHydrator::hydrate($newCommentData);
        $comment->save();

        return $comment;
    }

    public function delete(Comment $comment): void
    {
        $comment->delete();
    }
}
