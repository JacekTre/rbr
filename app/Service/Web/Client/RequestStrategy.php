<?php

namespace App\Service\Web\Client;

interface RequestStrategy
{
    public function __construct(string $path, ?string $body);

    public function sendRequest(): array;
}
