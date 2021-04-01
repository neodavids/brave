<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use Session;
use Auth;
use App\Facility;
use App\Http\Resources\Facility as FacilityResource;
use App\Http\Resources\FacilityCollection;
use App\User;
use App\Shoot;
use App\Doc;
use App\Show;


class FacilityController extends Controller
{
  public function __construct(){
    $this->middleware('auth:api',['except'=>array('index','show')]);
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
				return new FacilityCollection($facilities);
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
				return new FacilityResource($facility);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        return new FacilityResource($facility);
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
				return new FacilityResource($facility);
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
				return redirect()->route('facilities.index');
    }
}
