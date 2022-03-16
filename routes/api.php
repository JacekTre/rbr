<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('posts', [PostController::class, 'getList']);
    Route::get('posts/{id}', [PostController::class, 'get']);
    Route::put('posts/{id}', [PostController::class, 'put']);
    Route::post('posts', [PostController::class, 'post']);
    Route::delete('posts/{id}', [PostController::class, 'delete']);

    Route::get('comments', [CommentController::class, 'getList']);
    Route::get('comments/{id}', [CommentController::class, 'get']);
    Route::put('comments/{id}', [CommentController::class, 'put']);
    Route::post('comments', [CommentController::class, 'post']);
    Route::delete('comments/{id}', [CommentController::class, 'delete']);
});
