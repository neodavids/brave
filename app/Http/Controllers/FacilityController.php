<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use Session;
use Auth;
use App\Facility;
use App\User;
use App\Shoot;
use App\Doc;
use App\Show;


class FacilityController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>array('index','show')]);
    $this->authorizeResource(Facility::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::paginate('10');
				return view('facilities.index',compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
				$shoots = Shoot::pluck('name','id');
				$docs = Doc::pluck('title','id');
				$shows = Show::pluck('user','id');
				return view('facilities.create',compact('users','shoots','docs','shows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacilityRequest $request)
    {
        $facility = Facility::create($request->all());
				$facility->users()->sync($request->users,false);
				$facility->shoots()->sync($request->shoots,false);
				$facility->docs()->sync($request->docs,false);
				$facility->shows()->sync($request->shows,false);
				Session::flash('success','facility  successfully created');
				return redirect()->route('facilities.show',$facility->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        return view('facilities.show',compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        $users = User::pluck('name','id');
				$shoots = Shoot::pluck('name','id');
				$docs = Doc::pluck('title','id');
				$shows = Show::pluck('user','id');
				return view('facilities.edit',compact('users','shoots','docs','shows','facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFacilityRequest $request,Facility $facility)
    {
        $facility->update($request->all());
				$facility->users()->sync($request->users);
				$facility->shoots()->sync($request->shoots);
				$facility->docs()->sync($request->docs);
				$facility->shows()->sync($request->shows);
				Session::flash('success','facility  successfully updated');
				return redirect()->route('facilities.show',$facility->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        $facility->users()->detach();
				$facility->bookings()->delete();
				$facility->shoots()->detach();
				$facility->docs()->detach();
				$facility->shows()->detach();
				$facility->delete();
				Session::flash('success','facility  successfully deleted');
				return redirect()->route('facilities.index');
    }
}
