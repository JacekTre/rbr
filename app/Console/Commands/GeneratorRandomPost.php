<?php

namespace App\Console\Commands;

use App\Service\Command\RandomPostService;
use Illuminate\Console\Command;

class GeneratorRandomPost extends Command
{
    protected $signature = 'create:random-post';

    protected $description = 'This command is used to generate a post via API for a random user.';

    private RandomPostService $service;

    public function __construct(
        RandomPostService $service
    ) {
        parent::__construct();

        $this->service = $service;
    }

    public function handle()
    {
        try {
            $this->service->generatePostViaApi();
            $this->info('Post was generated!');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
