<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Session;
use Auth;
use App\Booking;
use App\Http\Resources\Booking as BookingResource;
use App\Http\Resources\BookingCollection;
use App\User;
use App\Facility;


class BookingController extends Controller
{
  public function __construct(){
    $this->middleware('auth:api',['except'=>array('index','show')]);
    $this->authorizeResource(Booking::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate('10');
				return new BookingCollection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create($request->all());
				$booking->users()->sync($request->users,false);
				$booking->facilities()->sync($request->facilities,false);
				return new BookingResource($booking);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request,Booking $booking)
    {
        $booking->update($request->all());
				$booking->users()->sync($request->users);
				$booking->facilities()->sync($request->facilities);
				return new BookingResource($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->users()->detach();
				$booking->facilities()->detach();
				$booking->delete();
				return redirect()->route('bookings.index');
    }
}
