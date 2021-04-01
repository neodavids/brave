<?php

namespace App\Policies;

use App\User;
use App\Doc;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the doc.
     *
     * @param  \App\User  $user
     * @param  \App\Doc  $doc
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin() || $user->IsManager()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the doc.
     *
     * @param  \App\User  $user
     * @param  \App\Doc  $doc
     * @return mixed
     */
    public function view(User $user, Doc $doc)
    {
        if($user->IsAdmin() || $user->IsManager() || $user->IsStaff()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the doc.
     *
     * @param  \App\User  $user
     * @param  \App\Doc  $doc
     * @return mixed
     */
    public function update(User $user, Doc $doc)
    {
      if ($user->id==$doc->user_id  || $user->IsManager() || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the doc.
     *
     * @param  \App\User  $user
     * @param  \App\Doc  $doc
     * @return mixed
     */
    public function delete(User $user, Doc $doc)
    {
      if ($user->id==$doc->user_id  || $user->IsAdmin() || $user->IsManager()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the doc.
     *
     * @param  \App\User  $user
     * @param  \App\Doc  $doc
     * @return mixed
     */
    public function restore(User $user, Doc $doc)
    {
      if ($user->id==$doc->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the doc.
     *
     * @param  \App\User  $user
     * @param  \App\Doc  $doc
     * @return mixed
     */
    public function forceDelete(User $user, Doc $doc)
    {
      if ($user->id==$doc->user_id  || $user->IsAdmin()) {
        return true;
      }
    }
}
