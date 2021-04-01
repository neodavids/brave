<?php

namespace App\Policies;

use App\User;
use App\Facility;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacilityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the facility.
     *
     * @param  \App\User  $user
     * @param  \App\Facility  $facility
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the facility.
     *
     * @param  \App\User  $user
     * @param  \App\Facility  $facility
     * @return mixed
     */
    public function view(User $user, Facility $facility)
    {
        if($user->IsAdmin()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the facility.
     *
     * @param  \App\User  $user
     * @param  \App\Facility  $facility
     * @return mixed
     */
    public function update(User $user, Facility $facility)
    {
      if ($user->id==$facility->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the facility.
     *
     * @param  \App\User  $user
     * @param  \App\Facility  $facility
     * @return mixed
     */
    public function delete(User $user, Facility $facility)
    {
      if ($user->id==$facility->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the facility.
     *
     * @param  \App\User  $user
     * @param  \App\Facility  $facility
     * @return mixed
     */
    public function restore(User $user, Facility $facility)
    {
      if ($user->id==$facility->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the facility.
     *
     * @param  \App\User  $user
     * @param  \App\Facility  $facility
     * @return mixed
     */
    public function forceDelete(User $user, Facility $facility)
    {
      if ($user->id==$facility->user_id  || $user->IsAdmin()) {
        return true;
      }
    }
}
