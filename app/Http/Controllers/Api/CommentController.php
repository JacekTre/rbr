<?php

namespace App\Http\Controllers\Api;

use App\Extractors\CommentExtractor;
use App\Extractors\PostExtractor;
use App\Extractors\ValidatorMessageExtractor;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Service\Api\CommentService;
use App\Service\Api\PostService;
use App\Service\Api\Response\FailureResponse;
use App\Service\Api\Response\SuccessResponse;
use App\Validators\CommentContentValidator;
use App\Validators\PostContentValidator;
use App\Validators\PostTitleValidator;
use App\Validators\PostValidator;
use App\Validators\UserValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    private CommentService $service;

    public function __construct(
        CommentService $service
    ) {
        $this->service = $service;
    }

    public function getList(): JsonResponse
    {
        try {
            $comments = $this->service->getAll();

            if (count($comments) < 1) {
                return response()->json((new FailureResponse('There is no any comments!'))->toArray(),200);
            }

            $extractComments = [];
            foreach ($comments as $comment) {
                $extractComments[] = CommentExtractor::extract($comment);
            }

            return response()->json((new SuccessResponse($extractComments))->toArray(), 200);
        } catch (\Exception $exception) {
            return response()->json((new FailureResponse($exception->getMessage()))->toArray(),500);
        }
    }

    public function get(int $id): JsonResponse
    {
        try {
            $comment = $this->service->getById($id);

            if (! $comment instanceof Comment) {
                return response()->json((new FailureResponse('Comment does not exist'))->toArray(),200);
            }

            return response()->json((new SuccessResponse(CommentExtractor::extract($comment)))->toArray(), 200);
        } catch (\Exception $exception) {
            return response()->json((new FailureResponse($exception->getMessage()))->toArray(), 500);
        }
    }

    public function put(int $id, Request $request): JsonResponse
    {
        try {
            $comment = $this->service->getById($id);

            if (! $comment instanceof Comment) {
                return response()->json((new FailureResponse('Comment does not exist'))->toArray(),200);
            }

            $validator = Validator::make($request->all(), [
                'content' => ['required', new CommentContentValidator()],
            ]);

            if ($validator->fails()) {
                $errors = implode(" ", ValidatorMessageExtractor::extract($validator));
                return response()->json((new FailureResponse($errors))->toArray(),200);
            }

            $updatedComment = $this->service->updateComment($comment, $request);
            return response()->json((new SuccessResponse(CommentExtractor::extract($updatedComment)))->toArray(), 200);
        } catch (\Exception $exception) {
            return response()->json((new FailureResponse($exception->getMessage()))->toArray());
        }
    }

    public function post(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'content' => ['required', new PostContentValidator()],
                'authorId' => ['required', new UserValidator()],
                'postId' => ['required', new PostValidator()]
            ]);

            if ($validator->fails()) {
                $errors = implode(" ", ValidatorMessageExtractor::extract($validator));
                return response()->json((new FailureResponse($errors))->toArray(),200);
            }

            $comment = $this->service->createComment($request);
            return response()->json((new SuccessResponse(CommentExtractor::extract($comment)))->toArray(), 200);
        } catch (\Exception $exception) {
            return response()->json((new FailureResponse($exception->getMessage()))->toArray(), 500);
        }
    }
}
