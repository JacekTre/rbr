<?php

namespace App\Http\Controllers\Api;

use App\Extractors\PostExtractor;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Service\Api\PostService;
use App\Service\Api\Response\FailureResponse;
use App\Service\Api\Response\SuccessResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private PostService $service;

    public function __construct(
        PostService $service
    ) {
        $this->service = $service;
    }

    public function getList(): JsonResponse
    {
        try {
            $posts = $this->service->getAll();

            if (count($posts) < 1) {
                return response()->json((new FailureResponse('There is no any posts!'))->toArray(),200);
            }

            $extractPosts = [];
            foreach ($posts as $post) {
                $extractPosts[] = PostExtractor::extract($post);
            }

            return response()->json((new SuccessResponse($extractPosts))->toArray(), 200);
        } catch (\Exception $exception) {
            return response()->json((new FailureResponse($exception->getMessage()))->toArray());
        }
    }

    public function get(int $id)
    {
        try {
            $post = $this->service->getById($id);

            if (! $post instanceof Post) {
                return response()->json((new FailureResponse('Post does not exist'))->toArray(),200);
            }

            return response()->json((new SuccessResponse(PostExtractor::extract($post)))->toArray(), 200);
        } catch (\Exception $exception) {
            return response()->json((new FailureResponse($exception->getMessage()))->toArray());
        }
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
