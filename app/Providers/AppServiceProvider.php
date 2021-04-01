<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
     {
         Schema::defaultStringLength(191);
         \App\Role::observe(\App\Observers\RoleObserver::class);
			\App\Booking::observe(\App\Observers\BookingObserver::class);
			\App\Issue::observe(\App\Observers\IssueObserver::class);
			\App\Shoot::observe(\App\Observers\ShootObserver::class);
			\App\Doc::observe(\App\Observers\DocObserver::class);
			\App\Show::observe(\App\Observers\ShowObserver::class);
			\App\Message::observe(\App\Observers\MessageObserver::class);
			\App\Department::observe(\App\Observers\DepartmentObserver::class);
			\App\Facility::observe(\App\Observers\FacilityObserver::class);
			
     }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
