<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use App\Models\Photo;
use App\Models\Path;
// use App\Classes\PhotoHandlingClass;
// use App\Services\PhotoHandler;
// use Carbon\Carbon;

class DeleteThumbnailsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $paths;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->getPaths();
    }

    public function getPaths()
    {
        $this->paths = Path::orderBy('path')->get();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $scanTime = Carbon::now();
        foreach($this->paths as $path) {
            // echo($path->path . PHP_EOL);
            $files = Storage::allFiles($path->path);
            foreach($files as $file) {
                echo($file . PHP_EOL);
                if (!str_contains($path->path, 'thumbs_')) {
                    File::deleteDirectory($path->path);
                }
            }
        }
    }
}
