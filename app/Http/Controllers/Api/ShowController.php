<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShowRequest;
use App\Http\Requests\UpdateShowRequest;
use Session;
use Auth;
use App\Show;
use App\Http\Resources\Show as ShowResource;
use App\Http\Resources\ShowCollection;
use App\User;


class ShowController extends Controller
{
  public function __construct(){
    $this->middleware('auth:api',['except'=>array('index','show')]);
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
				return new ShowCollection($shows);
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
				return new ShowResource($show);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show)
    {
        return new ShowResource($show);
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
				return new ShowResource($show);
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
				return redirect()->route('shows.index');
    }
}
