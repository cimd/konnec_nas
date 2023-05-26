<?php

namespace App\Packages\Plex\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class remove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plex:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List Apache virtual servers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $process = new Process(['sudo', 'dpkg', '-r', 'plexmediaserver']);
        $process->run();
        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $result = $process->getOutput();
        $this->line($result);

        return $result;
    }
}
