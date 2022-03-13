<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.list');
    Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'getUser'])->name('users.getUser');

    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.list');
    Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'getPost'])->name('posts.getPost');
});
