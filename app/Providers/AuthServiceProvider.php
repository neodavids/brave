<?php

namespace App\Providers;

use App\Role;
use App\Booking;
use App\Issue;
use App\Shoot;
use App\Doc;
use App\Show;
use App\Message;
use App\Department;
use App\Facility;
use App\Policies\RolePolicy;
use App\Policies\BookingPolicy;
use App\Policies\IssuePolicy;
use App\Policies\ShootPolicy;
use App\Policies\DocPolicy;
use App\Policies\ShowPolicy;
use App\Policies\MessagePolicy;
use App\Policies\DepartmentPolicy;
use App\Policies\FacilityPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RolePolicy::class,
				Booking::class => BookingPolicy::class,
				Issue::class => IssuePolicy::class,
				Shoot::class => ShootPolicy::class,
				Doc::class => DocPolicy::class,
				Show::class => ShowPolicy::class,
				Message::class => MessagePolicy::class,
				Department::class => DepartmentPolicy::class,
				Facility::class => FacilityPolicy::class,
				
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
