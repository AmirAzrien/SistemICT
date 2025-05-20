<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class StartDevelopment extends Command
{
    protected $signature = 'start:dev';
    protected $description = 'Start the Laravel app and compile frontend assets';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Run PHP server in background
        $this->info('Starting PHP server...');
        $process1 = new Process(['php', 'artisan', 'serve']);
        $process1->start();

        // Run npm run dev to compile assets
        $this->info('Starting npm dev server...');
        $process2 = new Process(['npm', 'run', 'dev']);
        $process2->start();

        // Allow both processes to run simultaneously
        $process1->wait();
        $process2->wait();

        if (!$process1->isSuccessful() || !$process2->isSuccessful()) {
            $this->error('One of the processes failed.');
        }

        $this->info('Both backend and frontend servers are running.');
    }
}
