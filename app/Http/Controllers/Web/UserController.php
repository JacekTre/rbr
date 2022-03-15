<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Web\UserService;
use function view;

class UserController extends Controller
{
    private UserService $service;

    public function __construct(
        UserService $service
    ) {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $users = $this->service->getAll();
        } catch (\Exception $e) {
            return view('error.index')->with([
                'errorMessage' => $e->getMessage()
            ]);
        }

        return view('controllers.user.index')->with([
            'users' => $users
        ]);
    }

    public function getUser(int $id)
    {
        try {
            $user = $this->service->getById($id);
        } catch (\Exception $e) {
            return view('error.index')->with([
                'errorMessage' => $e->getMessage()
            ]);
        }

        if (! $user instanceof User) {
            return view('error.index')->with([
                'errorMessage' => 'Nie znaleziono użytkownika'
            ]);
        }

        return view('controllers.user.getUser')->with([
            'user' => $user
        ]);
    }
}
