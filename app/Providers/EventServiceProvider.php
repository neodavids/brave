<?php

namespace App\Providers;

use App\Events\BookingCreatedEvent;
use App\Events\IssueCreatedEvent;
use App\Events\MessageCreatedEvent;
use App\Events\UserCreatedEvent;
use App\Events\IssueUpdatedEvent;
use App\Events\BookingUpdatedEvent;
use App\Events\MessageUpdatedEvent;
use App\Listeners\BookingCreatedEventListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BookingCreatedEvent::class => [
						BookingCreatedEventListener::class,
				],IssueCreatedEvent::class => [
										],MessageCreatedEvent::class => [
										],UserCreatedEvent::class => [
										],IssueUpdatedEvent::class => [
										],BookingUpdatedEvent::class => [
										],MessageUpdatedEvent::class => [
										],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
