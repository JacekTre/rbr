<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Service\Web\PostService;
use function view;

class PostController extends Controller
{
    private PostService $service;

    public function __construct(
        PostService $service
    ) {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $posts = $this->service->getAll();
        } catch (\Exception $e) {
            return view('error.index')->with([
                'errorMessage' => $e->getMessage()
            ]);
        }

        return view('controllers.post.index')->with([
            'posts' => $posts
        ]);
    }

    public function getPost(int $id)
    {
        try {
            $post = $this->service->getById($id);
        } catch (\Exception $e) {
            return view('error.index')->with([
                'errorMessage' => $e->getMessage()
            ]);
        }

        if (! $post instanceof Post) {
            return view('error.index')->with([
                'errorMessage' => 'Nie znaleziono postu'
            ]);
        }

        return view('controllers.post.getPost')->with([
            'post' => $post
        ]);
    }
}
