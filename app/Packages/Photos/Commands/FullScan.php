<?php

namespace App\Packages\Photos\Commands;

use App\Jobs\Photo\FullScanJob;
use Illuminate\Console\Command;

class FullScan extends Command
{
    // private $paths;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'photo:full-scan';

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
     */
    public function handle(): int
    {
        FullScanJob::dispatch();

        return 0;
    }
}
