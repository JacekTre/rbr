<?php

namespace App\Service\Web\Client;

class RequestPost extends AbstractRequest implements RequestStrategy
{
    public function __construct(string $path, ?string $body)
    {
        parent::__construct($path, $body);
    }

    public function sendRequest(): array
    {
        return $this->post($this->getPath(), $this->getBody());
    }
}
