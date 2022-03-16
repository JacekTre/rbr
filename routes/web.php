<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\ApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/users', [UserController::class, 'index'])->name('users.list');
    Route::get('/users/{id}', [UserController::class, 'getUser'])->name('users.getUser');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.list');
    Route::get('/posts/{id}', [PostController::class, 'getPost'])->name('posts.getPost');

    Route::get('/client', [ApiController::class, 'index'])->name('client.list');
    Route::post('/client/result', [ApiController::class, 'getResult'])->name('client.result');
});
