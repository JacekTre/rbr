<?php

namespace App\Extractors;

use App\Models\User;

class UserExtractor
{
    public static function extract(?User $user): array
    {
        if (! $user instanceof User) {
            return [];
        }

        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'createdAt' => $user->getCreatedAt(),
            'updatedAt' => $user->getUpdatedAt(),
        ];
    }
}
