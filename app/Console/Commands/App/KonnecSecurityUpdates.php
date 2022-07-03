<?php

namespace App\Console\Commands\Packages\Apache;

use Illuminate\Console\Command;
use App\Jobs\ApacheRestartJob;
class KonnecSecurityUpdates extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'konnec:security-updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run security Updates';

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
