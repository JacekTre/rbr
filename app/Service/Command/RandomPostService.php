<?php

namespace App\Service\Command;

use App\Hydrators\CreatePostHydrator;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;

class RandomPostService
{
    private UserRepository $users;

    public function __construct(
        UserRepository $users
    ) {
        $this->users = $users;
    }

    public function generatePostViaApi(): void
    {
        $randomUserId = rand(1, $this->users->countAllUsers());
        $data['author'] = $this->users->getById($randomUserId);
        $data['title'] = Str::random(30);
        $data['content'] = Str::random(120);

        $post = CreatePostHydrator::hydrate($data);
        $post->save();
    }
}
