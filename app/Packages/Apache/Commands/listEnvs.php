<?php

namespace App\Packages\Apache\Commands;

use Illuminate\Console\Command;

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
        // $path = 'C:\\Users\\Ingo\\OneDrive\\Desktop';
        $result = scandir(config('global.apache_virtual_envs_path'));
        // $result = explode(' ', $list);
        $this->line($result);

        return $result;
    }
}
