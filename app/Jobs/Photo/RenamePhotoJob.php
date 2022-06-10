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
use App\Services\PhotoHandler;

class RenamePhotoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $photo;
    protected $newPath;
    protected $newFilename;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Photo $photo, $newPath, $newFilename)
    {
        $this->photo = $photo;
        $this->newPath = $newPath;
        $this->newFilename = $newFilename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $newPath = $this->newPath . $this->newFilename;
        PhotoHandler::photo($this->photo)->rename($newPath);
        $this->updateModel();
    }

    private function updateModel() {
        $this->photo->path = $this->newPath;
        $this->photo->filename = $this->newFilename;
        $this->photo->save();
    }
}
