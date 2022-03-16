<?php

namespace App\Console\Commands;

use App\Hydrators\CreateUserHydrator;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'create:user';

    protected $description = 'Command to create a user.';

    private UserRepository $users;

    public function __construct(
        UserRepository $users
    ) {
        parent::__construct();

        $this->users = $users;
    }

    public function handle()
    {
        $data['name'] = $this->ask('What is your name?');
        $data['email'] = $this->ask('What is your email?');
        $data['password'] = $this->secret('What is the password?');

        try {
            $existingUser = $this->users->getByEmail($data['email']);

            if ($existingUser instanceof User) {
                $this->error('User already exist!');
                return;
            }

            if (strlen($data['password']) < 8) {
                $this->error('Password must be longer than 8 characters!');
                return;
            }

            $user = CreateUserHydrator::hydrate($data);
            $user->save();

            $this->info('The user has been created.');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
