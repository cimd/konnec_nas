<?php

namespace App\Packages\Photos\Commands;

use App\Jobs\Photo\QuickScanJob;
use Illuminate\Console\Command;

class QuickScan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'photo:quick-scan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Quick Scan paths';

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
        QuickScanJob::dispatch();

        return 0;
    }
}
