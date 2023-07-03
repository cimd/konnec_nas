<?php

namespace App\Models\Jobs;

use App\Services\PhotoHandler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
     */
    public function handle(): void
    {
        $newPath = $this->newPath.$this->newFilename;
        PhotoHandler::photo($this->photo)->rename($newPath);
        $this->updateModel();
    }

    private function updateModel()
    {
        $this->photo->path = $this->newPath;
        $this->photo->filename = $this->newFilename;
        $this->photo->save();
    }
}
