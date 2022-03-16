<?php

declare(strict_types=1);

namespace App\Models\Traits;

trait UpdatedAtTrait
{
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }
}

