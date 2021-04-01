<?php

namespace App\Policies;

use App\User;
use App\Message;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the message.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the message.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {
        if($user->IsStaff() || $user->IsManager() || $user->IsAdmin()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the message.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
      if ($user->id==$message->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
      if ($user->id==$message->user_id  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the message.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function restore(User $user, Message $message)
    {
      if ($user->id==$message->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the message.
     *
     * @param  \App\User  $user
     * @param  \App\Message  $message
     * @return mixed
     */
    public function forceDelete(User $user, Message $message)
    {
      if ($user->id==$message->user_id  || $user->IsAdmin()) {
        return true;
      }
    }
}
