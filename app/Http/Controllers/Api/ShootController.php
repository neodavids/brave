<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShootRequest;
use App\Http\Requests\UpdateShootRequest;
use Session;
use Auth;
use App\Shoot;
use App\Http\Resources\Shoot as ShootResource;
use App\Http\Resources\ShootCollection;
use App\User;


class ShootController extends Controller
{
  public function __construct(){
    $this->middleware('auth:api',['except'=>array('index','show')]);
    $this->authorizeResource(Shoot::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoots = Shoot::paginate('10');
				return new ShootCollection($shoots);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShootRequest $request)
    {
        $shoot = Shoot::create($request->all());
				$shoot->users()->sync($request->users,false);
				return new ShootResource($shoot);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shoot $shoot)
    {
        return new ShootResource($shoot);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShootRequest $request,Shoot $shoot)
    {
        $shoot->update($request->all());
				$shoot->users()->sync($request->users);
				return new ShootResource($shoot);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoot $shoot)
    {
        $shoot->users()->detach();
				$shoot->facilities()->delete();
				$shoot->delete();
				return redirect()->route('shoots.index');
    }
}
