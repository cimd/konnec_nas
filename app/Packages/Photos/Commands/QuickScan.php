<?php

namespace App\Packages\Photos\Commands;

use App\Models\Jobs\QuickScanJob;
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
     */
    public function handle(): int
    {
        QuickScanJob::dispatch();

        return 0;
    }
}
