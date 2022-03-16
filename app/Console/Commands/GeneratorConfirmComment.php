<?php

namespace App\Console\Commands;

use App\Service\Command\ConfirmCommentService;
use Illuminate\Console\Command;

class GeneratorConfirmComment extends Command
{
    protected $signature = 'create:confirm-comment';

    protected $description = 'Command to add a YES comment to the post.';

    private ConfirmCommentService $service;

    public function __construct(
        ConfirmCommentService $service
    ) {
        parent::__construct();
        $this->service = $service;
    }

    public function handle()
    {
        try {
            $this->service->generateConfirmCommentViaApi();
            $this->info('Comment was created!');
        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }
    }
}
