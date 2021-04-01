<?php

namespace App\Observers;

use App\Facility;
use Auth;
use Event;

class FacilityObserver
{
    /**
     * Handle the Facility "creating" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function creating(Facility $facility)
    {
        $facility->user_id = auth()->user()->id;
    }

    /**
     * Handle the Facility "created" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function created(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "updating" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function updating(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "updated" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function updated(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "deleting" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function deleting(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "deleted" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function deleted(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "Restoring" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function restoring(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "restored" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function restored(Facility $facility)
    {
        //
    }

    /**
     * Handle the Facility "force deleted" event.
     *
     * @param  \App\Facility  $facility
     * @return void
     */
    public function forceDeleted(Facility $facility)
    {
        //
    }
}
