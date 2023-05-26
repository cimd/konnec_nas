<?php

namespace App\Observers;

use App\Models\Photo;

class PhotoObserver
{
    /**
     * Handle the Photo "created" event.
     *
     * @return void
     */
    public function created(Photo $photo): void
    {
        //
    }

    /**
     * Handle the Photo "updated" event.
     *
     * @return void
     */
    public function updated(Photo $photo): void
    {
        //
    }

    /**
     * Handle the Photo "deleted" event.
     *
     * @return void
     */
    public function deleted(Photo $photo): void
    {
        //
    }

    /**
     * Handle the Photo "restored" event.
     *
     * @return void
     */
    public function restored(Photo $photo): void
    {
        //
    }

    /**
     * Handle the Photo "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Photo $photo): void
    {
        //
    }
}
