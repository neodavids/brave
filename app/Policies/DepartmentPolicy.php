<?php

namespace App\Policies;

use App\User;
use App\Department;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function view(User $user, Department $department)
    {
        if($user->IsAdmin()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function update(User $user, Department $department)
    {
      if ($user->id==$department->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function delete(User $user, Department $department)
    {
      if ($user->id==$department->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function restore(User $user, Department $department)
    {
      if ($user->id==$department->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function forceDelete(User $user, Department $department)
    {
      if ($user->id==$department->user_id  || $user->IsAdmin()) {
        return true;
      }
    }
}
