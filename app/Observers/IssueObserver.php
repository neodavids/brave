<?php

namespace App\Observers;

use App\Issue;
use Auth;
use Event;

class IssueObserver
{
    /**
     * Handle the Issue "creating" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function creating(Issue $issue)
    {
        $issue->user_id = auth()->user()->id;
    }

    /**
     * Handle the Issue "created" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function created(Issue $issue)
    {
        //
    }

    /**
     * Handle the Issue "updating" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function updating(Issue $issue)
    {
        //
    }

    /**
     * Handle the Issue "updated" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function updated(Issue $issue)
    {
        //
    }

    /**
     * Handle the Issue "deleting" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function deleting(Issue $issue)
    {
        //
    }

    /**
     * Handle the Issue "deleted" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function deleted(Issue $issue)
    {
        //
    }

    /**
     * Handle the Issue "Restoring" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function restoring(Issue $issue)
    {
        //
    }

    /**
     * Handle the Issue "restored" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function restored(Issue $issue)
    {
        //
    }

    /**
     * Handle the Issue "force deleted" event.
     *
     * @param  \App\Issue  $issue
     * @return void
     */
    public function forceDeleted(Issue $issue)
    {
        //
    }
}
