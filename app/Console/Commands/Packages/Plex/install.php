<?php

namespace App\Console\Commands\Packages\Plex;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Package;
class install extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plex:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Plex Media Server';

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
        // var_dump($package->newest_version);
        $this->line($package->newest_version);

        $url = "https://downloads.plex.tv/plex-media-server-new/{$package->newest_version}/debian/plexmediaserver_{$package->newest_version}_amd64.deb";
        $this->info($url);
        $this->info(storage_path('temp') . '/plex.deb');
        $processDownload = new Process(['wget', '-O', storage_path('temp') . '/plex.deb', $url]);
        $processDownload->run();
        // executes after the command finishes
        if (!$processDownload->isSuccessful()) {
            throw new ProcessFailedException($processDownload);
        }
        $this->info('Downloaded');
        $this->info('Installing');

        $process = new Process(['sudo', 'dpkg ', '-i', storage_path('temp') . '/plex.deb']);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $result = $process->getOutput();
        $this->line($result);

        return true;
    }
}
