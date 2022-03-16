<?php

declare(strict_types=1);

namespace App\Models\Traits;

trait IdTrait
{
    public function getId(): int
    {
        return $this->id;
    }
}
