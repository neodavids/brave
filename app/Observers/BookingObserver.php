<?php

namespace App\Observers;

use App\Booking;
use Auth;
use Event;

class BookingObserver
{
    /**
     * Handle the Booking "creating" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function creating(Booking $booking)
    {
        $booking->user_id = auth()->user()->id;
    }

    /**
     * Handle the Booking "created" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "updating" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function updating(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "updated" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function updated(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "deleting" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function deleting(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "deleted" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function deleted(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "Restoring" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function restoring(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function restored(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     *
     * @param  \App\Booking  $booking
     * @return void
     */
    public function forceDeleted(Booking $booking)
    {
        //
    }
}
