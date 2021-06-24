<?php

namespace App\Console\Commands\PackageCentre\Lollypop;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class removeLollypop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:lollypop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Lollypop';

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
        $process = new Process(['apt', 'remove', 'lollypop']);
        $process->run();
    }
}
