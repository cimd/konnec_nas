<?php

namespace App\Console\Commands\Photos;

use Illuminate\Console\Command;
use App\Jobs\FullScanJob;

class FullScan extends Command
{
    // private $paths;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'full:scan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Full Scan';

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
        FullScanJob::dispatch();
        return 0;
    }
}
