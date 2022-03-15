<?php

namespace App\Service\Api;

use App\Hydrators\CreatePostHydrator;
use App\Hydrators\UpdatePostHydrator;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostService
{
    private PostRepository $posts;

    private UserRepository $users;

    public function __construct(
        PostRepository $posts,
        UserRepository $users
    ) {
        $this->posts = $posts;
        $this->users = $users;
    }

    public function getAll(): Collection
    {
        return $this->posts->getAll();
    }

    public function getById(int $id): ?Post
    {
        return $this->posts->getById($id);
    }

    public function createPost(Request $request): Post
    {
        $newPostData = [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'author' => $this->users->getById((int)$request->get('authorId')),
        ];

        $post = CreatePostHydrator::hydrate($newPostData);
        $post->save();

        return $post;
    }

    public function updatePost(Post $post, Request $request): Post
    {
        $postData = [
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ];

        $updatedPost = UpdatePostHydrator::hydrate($post, $postData);
        $updatedPost->save();

        return $updatedPost;
    }
}
