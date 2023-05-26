<?php

namespace App\Console\Commands\Shell;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class run extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:command {params}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run custom command';

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
        // dd($this->argument('params'));
        $cmds = explode(' ', $this->argument('params'));

        $process = new Process($cmds);
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
