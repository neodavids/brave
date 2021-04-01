<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;
use Session;
use Auth;
use App\Show;
use App\User;


class ShowController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>array('index','show')]);
    $this->authorizeResource(Show::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::paginate('10');
				return view('shows.index',compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
				return view('shows.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShowRequest $request)
    {
        $show = Show::create($request->all());
				$show->users()->sync($request->users,false);
				Session::flash('success','show  successfully created');
				return redirect()->route('shows.show',$show->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show)
    {
        return view('shows.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        $users = User::pluck('name','id');
				return view('shows.edit',compact('users','show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShowRequest $request,Show $show)
    {
        $show->update($request->all());
				$show->users()->sync($request->users);
				Session::flash('success','show  successfully updated');
				return redirect()->route('shows.show',$show->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        $show->users()->detach();
				$show->departments()->delete();
				$show->facilities()->delete();
				$show->delete();
				Session::flash('success','show  successfully deleted');
				return redirect()->route('shows.index');
    }
}
