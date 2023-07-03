<?php

namespace App\Packages\Photos\Commands;

use App\Models\Jobs\DeleteThumbnailsJob;
use Illuminate\Console\Command;

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
     */
    public function handle(): int
    {
        DeleteThumbnailsJob::dispatch();

        return 0;
    }
}
