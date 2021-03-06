<?php

namespace App\Policies;

use App\User;
use App\Booking;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the booking.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the booking.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function view(User $user, Booking $booking)
    {
        if($user->IsAdmin() || $user->IsManager() || $user->IsStaff()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the booking.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function update(User $user, Booking $booking)
    {
      if ($user->id==$booking->user_id  || $user->IsAdmin() || $user->IsManager() || $user->IsStaff()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the booking.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function delete(User $user, Booking $booking)
    {
      if ($user->id==$booking->user_id  || $user->IsAdmin() || $user->IsManager()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the booking.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function restore(User $user, Booking $booking)
    {
      if ($user->id==$booking->user_id  || $user->IsAdmin()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the booking.
     *
     * @param  \App\User  $user
     * @param  \App\Booking  $booking
     * @return mixed
     */
    public function forceDelete(User $user, Booking $booking)
    {
      if ($user->id==$booking->user_id  || $user->IsAdmin()) {
        return true;
      }
    }
}
