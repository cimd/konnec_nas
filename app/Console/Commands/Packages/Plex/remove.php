<?php

namespace App\Console\Commands\Packages\Plex;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class remove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apache:list-envs';

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
     *
     * @return int
     */
    public function handle()
    {
        $process = new Process(['sudo', 'dpkg', '-r', 'plexmediaserver']);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $result = $process->getOutput();
        $this->line($result);
        return $result;
    }
}
