<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShootRequest;
use App\Http\Requests\UpdateShootRequest;
use Session;
use Auth;
use App\Shoot;
use App\User;


class ShootController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>array('index','show')]);
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
				return view('shoots.index',compact('shoots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
				return view('shoots.create',compact('users'));
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
				Session::flash('success','shoot  successfully created');
				return redirect()->route('shoots.show',$shoot->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shoot $shoot)
    {
        return view('shoots.show',compact('shoot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoot $shoot)
    {
        $users = User::pluck('name','id');
				return view('shoots.edit',compact('users','shoot'));
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
				Session::flash('success','shoot  successfully updated');
				return redirect()->route('shoots.show',$shoot->id);
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
				Session::flash('success','shoot  successfully deleted');
				return redirect()->route('shoots.index');
    }
}
