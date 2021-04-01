<?php

namespace App\Observers;

use App\Message;
use Auth;
use Event;

class MessageObserver
{
    /**
     * Handle the Message "creating" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function creating(Message $message)
    {
        $message->user_id = auth()->user()->id;
    }

    /**
     * Handle the Message "created" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function created(Message $message)
    {
        //
    }

    /**
     * Handle the Message "updating" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function updating(Message $message)
    {
        //
    }

    /**
     * Handle the Message "updated" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function updated(Message $message)
    {
        //
    }

    /**
     * Handle the Message "deleting" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function deleting(Message $message)
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function deleted(Message $message)
    {
        //
    }

    /**
     * Handle the Message "Restoring" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function restoring(Message $message)
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function restored(Message $message)
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function forceDeleted(Message $message)
    {
        //
    }
}
