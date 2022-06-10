<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ExifTool;
use App\Models\Photo;

class Test extends Command
{
    private $paths;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Test';

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
        $photo = Photo::find(1);
        ExifTool::photo($photo)->tags();
        return 0;
    }
}
