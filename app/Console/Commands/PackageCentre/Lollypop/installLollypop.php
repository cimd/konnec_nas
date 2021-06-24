<?php

namespace App\Console\Commands\PackageCentre\Lollypop;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class instalLollypop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:lollypop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Lollypop';

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
        $process = new Process(['apt', 'install', 'lollypop']);
        $process->run();
    }
}
