<?php

namespace App\Jobs\Photo;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;
use App\Models\Photo\Photo;
use App\Models\Photo\Path;
// use App\Classes\PhotoHandlingClass;
use App\Services\Photo\PhotoHandler;
use Carbon\Carbon;

class QuickScanJob implements ShouldQueue
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
        // var_dump($this->paths);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $scanTime = Carbon::now();
        foreach($this->paths as $path) {
            // echo($path->path . PHP_EOL);
            $files = Storage::disk('photos')->allFiles($path->path);
            // echo($files);
            foreach($files as $file) {
                // echo('hay' . PHP_EOL);
                if (!str_contains($file, 'thumbs_')) {
                    $this->readFile($file, $scanTime);
                }
            }
        }
        $this->deletePhotosNotFound($scanTime);
    }

    private function readFile($file, $scanTime)
    {
        $filePath = Storage::disk('photos')->path($file);
        PhotoHandler::path($filePath)->import($scanTime)->createThumbnails();
    }

    private function deletePhotosNotFound($scan_time) {
        $notFound = Photo::where('last_scan', '!=', $scan_time)->get();
        foreach($notFound as $photo) {
            $photo->delete();
        }
    }
}
