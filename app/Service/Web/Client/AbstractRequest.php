<?php

namespace App\Service\Web\Client;

abstract class AbstractRequest extends AbstractApiClient
{
    private string $path;

    private array $body;

    public function __construct(string $path, ?string $body = "")
    {
        $this->path = $path;
        $this->body = $body ? json_decode($body, true) : [];
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getBody(): array
    {
        return $this->body;
    }
}
