<?php

namespace App\Console\Commands\Packages\Apache;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class listEnvs extends Command
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
    protected $description = 'APache list envs';

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
        // $path = '/var/apache2/sites-available';
        $path = 'C:\\Users\\Ingo\\OneDrive\\Desktop';
        $result = scandir($path);
        // $result = explode(' ', $list);
        $this->line($result);
        return $result;
    }
}
