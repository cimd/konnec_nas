<?php

namespace App\Console\Commands\Photo;

use Illuminate\Console\Command;
use App\Jobs\DeleteThumbnailsJob;

class DeleteThumbnails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:thumbs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete All thumbnails';

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
        DeleteThumbnailsJob::dispatch();
        return 0;
    }
}
