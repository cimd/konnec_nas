<?php

namespace App\Packages\Apache\Commands;

use Illuminate\Console\Command;

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
     */
    public function handle(): int
    {
        // $path = '/var/apache2/sites-available/';
        // a2enconf php8.0-fpm
        $process = new Process(['sudo', 'a2enconf', config('global.apache_virtual_envs_path').$this->argument('filename')]);
        $process->run();
        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        // $result = $process->getOutput();
        // $this->line($result);
        return $result;
    }
}
