<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Storage;
use App\Models\Photo;
use App\Models\Path;
// use App\Classes\PhotoHandlingClass;
use App\Services\PhotoHandler;
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
            $files = Storage::allFiles($path->path);
            // echo($files[0]);
            foreach($files as $file) {
                // echo($file);
                if (!str_contains($file, 'thumbs_')) {
                    $this->readFile($file, $scanTime);
                }
            }
        }
        $this->deletePhotosNotFound($scanTime);
    }

    private function readFile($file, $scanTime)
    {
        $filePath = Storage::path($file);
        PhotoHandler::path($filePath)->import($scanTime)->createThumbnails();
        // $photoData = PhotoHandler::import($filePath);
        // $photo = Photo::updateOrCreate(
        //     [
        //         'path' =>  $photoData['path'],
        //         'filename' => $photoData['filename']
        //     ],
        //     [
        //         'sort_title' => $photoData['sort_title'],
        //         'size' => $photoData['size'],
        //         'last_modified' => $photoData['last_modified'],
        //         'last_scan' => $scanTime,
        //         'date_taken' => $photoData['date_taken'],
        //         'mime_type' => $photoData['mime_type']
        //     ]
        // );
    }

    private function deletePhotosNotFound($scan_time) {
        $notFound = Photo::where('last_scan', '!=', $scan_time)->get();
        foreach($notFound as $photo) {
            $photo->delete();
        }
    }
}
