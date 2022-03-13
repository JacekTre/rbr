<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    public function getAll(int $pageSize): ?LengthAwarePaginator
    {
        return User::paginate($pageSize);
    }

    public function getById(int $userId): ?User
    {
        return User::find($userId);
    }
}
