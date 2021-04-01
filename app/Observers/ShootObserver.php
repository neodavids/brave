<?php

namespace App\Observers;

use App\Shoot;
use Auth;
use Event;

class ShootObserver
{
    /**
     * Handle the Shoot "creating" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function creating(Shoot $shoot)
    {
        $shoot->user_id = auth()->user()->id;
    }

    /**
     * Handle the Shoot "created" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function created(Shoot $shoot)
    {
        //
    }

    /**
     * Handle the Shoot "updating" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function updating(Shoot $shoot)
    {
        //
    }

    /**
     * Handle the Shoot "updated" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function updated(Shoot $shoot)
    {
        //
    }

    /**
     * Handle the Shoot "deleting" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function deleting(Shoot $shoot)
    {
        //
    }

    /**
     * Handle the Shoot "deleted" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function deleted(Shoot $shoot)
    {
        //
    }

    /**
     * Handle the Shoot "Restoring" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function restoring(Shoot $shoot)
    {
        //
    }

    /**
     * Handle the Shoot "restored" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function restored(Shoot $shoot)
    {
        //
    }

    /**
     * Handle the Shoot "force deleted" event.
     *
     * @param  \App\Shoot  $shoot
     * @return void
     */
    public function forceDeleted(Shoot $shoot)
    {
        //
    }
}
