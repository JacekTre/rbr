<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [\App\Http\Controllers\Web\HomeController::class, 'index'])->name('home');
    Route::get('/users', [\App\Http\Controllers\Web\UserController::class, 'index'])->name('users.list');
    Route::get('/users/{id}', [\App\Http\Controllers\Web\UserController::class, 'getUser'])->name('users.getUser');

    Route::get('/posts', [\App\Http\Controllers\Web\PostController::class, 'index'])->name('posts.list');
    Route::get('/posts/{id}', [\App\Http\Controllers\Web\PostController::class, 'getPost'])->name('posts.getPost');
});
