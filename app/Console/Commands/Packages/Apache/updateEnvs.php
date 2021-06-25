<?php

namespace App\Console\Commands\Packages\Apache;

use Illuminate\Console\Command;
use App\Jobs\ApacheRestartJob;
class updateEnvs extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apache:update-envs {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restart Apache Server';

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
        // $path = '/var/apache2/sites-available/';
        // sudo a2enconf php8.0-fpm
        $process = new Process(['sudo', 'a2enconf', config('global.apache_virtual_envs_path') . $this->argument('filename')]);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        // $result = $process->getOutput();
        // $this->line($result);
        return $result;
    }
}
