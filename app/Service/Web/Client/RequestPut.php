<?php

namespace App\Service\Web\Client;

class RequestPut extends AbstractRequest implements RequestStrategy
{
    public function __construct(string $path, ?string $body)
    {
        parent::__construct($path, $body);
    }

    public function sendRequest(): array
    {
        return $this->put($this->getPath(), $this->getBody());
    }
}
