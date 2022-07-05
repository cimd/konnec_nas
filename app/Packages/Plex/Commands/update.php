<?php

namespace App\Packages\Plex\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Package;
class update extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plex:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Plex Media Server';

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
        $package = Package::where('name', 'Plex')->first();
        
        $processDownload = new Process(['wget', $package->newest_version_url]);
        $processDownload->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $process = new Process(['sudo', 'dpkg ', '-i', $package->newest_version_filename]);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $result = $process->getOutput();
        $this->line($result);
        return $result;
    }
}
