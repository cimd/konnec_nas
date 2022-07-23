<?php

namespace App\Packages\Apache\Commands;

use Illuminate\Console\Command;
use App\Jobs\ApacheRestartJob;
class restart extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apache:restart';

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
        ApacheRestartJob::dispatchAfterResponse();
        return true;
    }
}
