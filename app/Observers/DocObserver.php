<?php

namespace App\Observers;

use App\Doc;
use Auth;
use Event;

class DocObserver
{
    /**
     * Handle the Doc "creating" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function creating(Doc $doc)
    {
        $doc->user_id = auth()->user()->id;
    }

    /**
     * Handle the Doc "created" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function created(Doc $doc)
    {
        //
    }

    /**
     * Handle the Doc "updating" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function updating(Doc $doc)
    {
        //
    }

    /**
     * Handle the Doc "updated" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function updated(Doc $doc)
    {
        //
    }

    /**
     * Handle the Doc "deleting" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function deleting(Doc $doc)
    {
        //
    }

    /**
     * Handle the Doc "deleted" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function deleted(Doc $doc)
    {
        //
    }

    /**
     * Handle the Doc "Restoring" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function restoring(Doc $doc)
    {
        //
    }

    /**
     * Handle the Doc "restored" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function restored(Doc $doc)
    {
        //
    }

    /**
     * Handle the Doc "force deleted" event.
     *
     * @param  \App\Doc  $doc
     * @return void
     */
    public function forceDeleted(Doc $doc)
    {
        //
    }
}
