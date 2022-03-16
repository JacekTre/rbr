<?php

namespace App\Service\Command;

use App\Service\Web\Client\AbstractApiClient;
use App\Service\Web\Client\RequestPost;

class ConfirmCommentService
{
    public const COMMENT = 'TAK';

    public function generateConfirmCommentViaApi(): void
    {
        $query = [
            'authorId' => (new RandomUser())->get()->getId(),
            'postId' => (new RandomPost())->get()->getId(),
            'content' => self::COMMENT
        ];

        $response = (new RequestPost($this->preparePath(), json_encode($query)))->sendRequest();

        if ($response['status'] !== AbstractApiClient::SUCCESS) {
            throw new \Exception('Could not create comment!');
        }
    }

    private function preparePath(): string
    {
        return config('services.api.basePathApi') . config('services.api.endpoints.comments');
    }
}
