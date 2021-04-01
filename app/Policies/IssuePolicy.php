<?php

namespace App\Policies;

use App\User;
use App\Issue;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class IssuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff() || $user->IsIntern()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function view(User $user, Issue $issue)
    {
        if($user->IsAdmin() || $user->IsManager() || $user->IsStaff() || $user->IsIntern()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function update(User $user, Issue $issue)
    {
      if ($user->id==$issue->user_id  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function delete(User $user, Issue $issue)
    {
      if ($user->id==$issue->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function restore(User $user, Issue $issue)
    {
      if ($user->id==$issue->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the issue.
     *
     * @param  \App\User  $user
     * @param  \App\Issue  $issue
     * @return mixed
     */
    public function forceDelete(User $user, Issue $issue)
    {
      if ($user->id==$issue->user_id  || $user->IsAdmin()) {
        return true;
      }
    }
}
