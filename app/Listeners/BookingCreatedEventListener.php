<?php

namespace App\Listeners;

use App\Events\BookingCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class BookingCreatedEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BookingCreatedEventListener  $event
     * @return void
     */
    public function handle(BookingCreatedEvent $event)
    {
        
    }
}
