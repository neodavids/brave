<?php

namespace App\Observers;

use App\Show;
use Auth;
use Event;

class ShowObserver
{
    /**
     * Handle the Show "creating" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function creating(Show $show)
    {
        $show->user_id = auth()->user()->id;
    }

    /**
     * Handle the Show "created" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function created(Show $show)
    {
        //
    }

    /**
     * Handle the Show "updating" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function updating(Show $show)
    {
        //
    }

    /**
     * Handle the Show "updated" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function updated(Show $show)
    {
        //
    }

    /**
     * Handle the Show "deleting" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function deleting(Show $show)
    {
        //
    }

    /**
     * Handle the Show "deleted" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function deleted(Show $show)
    {
        //
    }

    /**
     * Handle the Show "Restoring" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function restoring(Show $show)
    {
        //
    }

    /**
     * Handle the Show "restored" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function restored(Show $show)
    {
        //
    }

    /**
     * Handle the Show "force deleted" event.
     *
     * @param  \App\Show  $show
     * @return void
     */
    public function forceDeleted(Show $show)
    {
        //
    }
}
