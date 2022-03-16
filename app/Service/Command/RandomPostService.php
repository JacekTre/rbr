<?php

namespace App\Service\Command;

use App\Hydrators\CreatePostHydrator;
use App\Repositories\UserRepository;
use App\Service\Web\Client\AbstractApiClient;
use App\Service\Web\Client\RequestPost;
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
        $query = [
            'authorId' => (new RandomUser())->get()->getId(),
            'title' => Str::random(30),
            'content' => Str::random(120)
        ];

        $response = (new RequestPost($this->preparePath(), json_encode($query)))->sendRequest();

        if ($response['status'] !== AbstractApiClient::SUCCESS) {
            throw new \Exception('Could not create comment!');
        }
    }

    private function preparePath(): string
    {
        return config('services.api.basePathApi') . config('services.api.endpoints.posts');
    }
}
