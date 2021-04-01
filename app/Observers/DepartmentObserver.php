<?php

namespace App\Observers;

use App\Department;
use Auth;
use Event;

class DepartmentObserver
{
    /**
     * Handle the Department "creating" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function creating(Department $department)
    {
        $department->user_id = auth()->user()->id;
    }

    /**
     * Handle the Department "created" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function created(Department $department)
    {
        //
    }

    /**
     * Handle the Department "updating" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function updating(Department $department)
    {
        //
    }

    /**
     * Handle the Department "updated" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function updated(Department $department)
    {
        //
    }

    /**
     * Handle the Department "deleting" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function deleting(Department $department)
    {
        //
    }

    /**
     * Handle the Department "deleted" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function deleted(Department $department)
    {
        //
    }

    /**
     * Handle the Department "Restoring" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function restoring(Department $department)
    {
        //
    }

    /**
     * Handle the Department "restored" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function restored(Department $department)
    {
        //
    }

    /**
     * Handle the Department "force deleted" event.
     *
     * @param  \App\Department  $department
     * @return void
     */
    public function forceDeleted(Department $department)
    {
        //
    }
}
