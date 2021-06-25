<?php

namespace App\Console\Commands\Packages\Apache;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class getEnvs extends Command
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
    protected $description = 'APache get envs';

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
        $path = '/var/apache2/sites-available';
        $result = scandir($path);
        $this->line($result);
        return $result
    }
}
