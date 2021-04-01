<?php

namespace App\Policies;

use App\User;
use App\Show;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShowPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the show.
     *
     * @param  \App\User  $user
     * @param  \App\Show  $show
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsStaff() || $user->IsManager() || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the show.
     *
     * @param  \App\User  $user
     * @param  \App\Show  $show
     * @return mixed
     */
    public function view(User $user, Show $show)
    {
        if($user->IsAdmin() || $user->IsManager() || $user->IsStaff()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the show.
     *
     * @param  \App\User  $user
     * @param  \App\Show  $show
     * @return mixed
     */
    public function update(User $user, Show $show)
    {
      if ($user->id==$show->user_id  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the show.
     *
     * @param  \App\User  $user
     * @param  \App\Show  $show
     * @return mixed
     */
    public function delete(User $user, Show $show)
    {
      if ($user->id==$show->user_id  || $user->IsAdmin() || $user->IsManager()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the show.
     *
     * @param  \App\User  $user
     * @param  \App\Show  $show
     * @return mixed
     */
    public function restore(User $user, Show $show)
    {
      if ($user->id==$show->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the show.
     *
     * @param  \App\User  $user
     * @param  \App\Show  $show
     * @return mixed
     */
    public function forceDelete(User $user, Show $show)
    {
      if ($user->id==$show->user_id  || $user->IsAdmin()) {
        return true;
      }
    }
}
