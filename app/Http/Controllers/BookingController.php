<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Session;
use Auth;
use App\Booking;
use DataTables;
use App\User;
use App\Facility;


class BookingController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>array('index','show')]);
    $this->authorizeResource(Booking::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('bookings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
				$facilities = Facility::pluck('name','id');
				return view('bookings.create',compact('users','facilities'));
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
				Session::flash('success','booking  successfully created');
				return redirect()->route('bookings.show',$booking->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('bookings.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $users = User::pluck('name','id');
				$facilities = Facility::pluck('name','id');
				return view('bookings.edit',compact('users','facilities','booking'));
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
				Session::flash('success','booking  successfully updated');
				return redirect()->route('bookings.show',$booking->id);
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
				Session::flash('success','booking  successfully deleted');
				return redirect()->route('bookings.index');
    }

    public function getRoute(){
      $routeName = Route::currentRouteName();
      dd($routeName);
  }
}
