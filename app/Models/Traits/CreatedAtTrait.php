<?php

declare(strict_types=1);

namespace App\Models\Traits;

trait CreatedAtTrait
{
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }
}
