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
    public function created(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "updated" event.
     *
     * @return void
     */
    public function updated(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "deleted" event.
     *
     * @return void
     */
    public function deleted(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "restored" event.
     *
     * @return void
     */
    public function restored(Photo $photo)
    {
        //
    }

    /**
     * Handle the Photo "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Photo $photo)
    {
        //
    }
}
