<?php

namespace App\Service\Web\Client;

class RequestDelete extends AbstractRequest implements RequestStrategy
{
    public function __construct(string $path, ?string $body)
    {
        parent::__construct($path, $body);
    }

    public function sendRequest(): array
    {
        return $this->delete($this->getPath());
    }
}
