<?php

namespace App\Policies;

use App\User;
use App\Shoot;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShootPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the shoot.
     *
     * @param  \App\User  $user
     * @param  \App\Shoot  $shoot
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the shoot.
     *
     * @param  \App\User  $user
     * @param  \App\Shoot  $shoot
     * @return mixed
     */
    public function view(User $user, Shoot $shoot)
    {
        if($user->IsAdmin() || $user->IsManager() || $user->IsStaff()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the shoot.
     *
     * @param  \App\User  $user
     * @param  \App\Shoot  $shoot
     * @return mixed
     */
    public function update(User $user, Shoot $shoot)
    {
      if ($user->id==$shoot->user_id  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the shoot.
     *
     * @param  \App\User  $user
     * @param  \App\Shoot  $shoot
     * @return mixed
     */
    public function delete(User $user, Shoot $shoot)
    {
      if ($user->id==$shoot->user_id  || $user->IsManager() || $user->IsAdmin() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the shoot.
     *
     * @param  \App\User  $user
     * @param  \App\Shoot  $shoot
     * @return mixed
     */
    public function restore(User $user, Shoot $shoot)
    {
      if ($user->id==$shoot->user_id  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the shoot.
     *
     * @param  \App\User  $user
     * @param  \App\Shoot  $shoot
     * @return mixed
     */
    public function forceDelete(User $user, Shoot $shoot)
    {
      if ($user->id==$shoot->user_id  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }
}
