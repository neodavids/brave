<?php

namespace App\Observers;

use App\Role;
use Auth;
use Event;

class RoleObserver
{
    /**
     * Handle the Role "creating" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function creating(Role $role)
    {
        $role->user_id = auth()->user()->id;
				if (Role::where('slug',Str::slug($role->name))->first()==null) {
					$slug = Str::slug($role->name);
				}else {
					$slug = Str::slug($role->name).'-'.uniqid();
				}
				$role->slug = $slug;
    }

    /**
     * Handle the Role "created" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        //
    }

    /**
     * Handle the Role "updating" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function updating(Role $role)
    {
        if ($role->getOriginal('name')!=$role->name) {
					if (Role::where('slug',Str::slug($role->name))->first()==null) {
						$role->slug = Str::slug($role->name);
					}else {
						$role->slug = Str::slug($role->name).'-'.uniqid();
					}
				}
    }

    /**
     * Handle the Role "updated" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        //
    }

    /**
     * Handle the Role "deleting" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function deleting(Role $role)
    {
        //
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        //
    }

    /**
     * Handle the Role "Restoring" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function restoring(Role $role)
    {
        //
    }

    /**
     * Handle the Role "restored" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
