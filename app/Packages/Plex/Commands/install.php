<?php

namespace App\Packages\Plex\Commands;

use App\Events\TerminalMessage;
use App\Models\Package;
use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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
    public function handle(): int
    {
        // $package = Package::where('name', 'Plex')->first();

        $process = new Process([dirname(__FILE__).'/install.sh']);
        $process->setTimeout(120);
        $process->start();

        foreach ($process as $type => $data) {
            TerminalMessage::dispatch($data);
            echo $data;
        }
        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return true;
    }
}
