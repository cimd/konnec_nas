<?php

namespace App\Packages\Apache\Commands;

use App\Jobs\ApacheRestartJob;
use Illuminate\Console\Command;

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
     */
    public function handle(): int
    {
        ApacheRestartJob::dispatchAfterResponse();

        return true;
    }
}
