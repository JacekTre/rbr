<?php

namespace App\Service;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public const PAGE_SIZE = 15;

    private UserRepository $users;

    public function __construct(
        UserRepository $users
    ) {
        $this->users = $users;
    }

    public function getAll(): ?LengthAwarePaginator
    {
        return $this->users->getAll(self::PAGE_SIZE);
    }

    public function getById(int $id): ?User
    {
        return $this->users->getById($id);
    }
}
