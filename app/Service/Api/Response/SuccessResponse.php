<?php

namespace App\Service\Api\Response;

class SuccessResponse extends AbstractResponse
{
    private array $data;

    public function __construct(array $data = [], array $context = [])
    {
        $this->status = self::SUCCESS;
        $this->data = $data;
        $this->context = $context;
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'data' => $this->data,
            'context' => $this->context
        ];
    }
}
