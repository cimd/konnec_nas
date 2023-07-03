<?php

namespace App\Models\Jobs;

use App\Models\Auth\User;
use App\Models\Photo\Path;
use App\Models\Photo\Photo;
use App\Models\Services\PhotoHandler;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

// use App\Classes\PhotoHandlingClass;

class QuickScanJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $paths;

    public function __construct(
        private User $user
    )
    {
        $this->getPaths();
    }

    public function getPaths(): void
    {
        $this->paths = Path::orderBy('path')->get();
        // var_dump($this->paths);
    }

    public function handle(): void
    {
        $scanTime = Carbon::now();
        foreach ($this->paths as $path) {
            // echo($path->path . PHP_EOL);
            $files = Storage::disk('photos')->allFiles($path->path);
            // echo($files);
            foreach ($files as $file) {
                // echo('hay' . PHP_EOL);
                if (! str_contains($file, 'thumbs_')) {
                    $this->readFile($file, $scanTime);
                }
            }
        }
        $this->deletePhotosNotFound($scanTime);
    }

    private function readFile($file, $scanTime): void
    {
        $filePath = Storage::disk('photos')->path($file);
        PhotoHandler::path($filePath)->import($scanTime)->createThumbnails();
    }

    private function deletePhotosNotFound($scan_time): void
    {
        $notFound = Photo::where('last_scan', '!=', $scan_time)->get();
        foreach ($notFound as $photo) {
            $photo->delete();
        }
    }
}
