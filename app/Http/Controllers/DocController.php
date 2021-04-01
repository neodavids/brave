<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDocRequest;
use App\Http\Requests\UpdateDocRequest;
use Session;
use Auth;
use App\Doc;
use App\User;


class DocController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>array('index','show')]);
    $this->authorizeResource(Doc::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Doc::paginate('10');
				return view('docs.index',compact('docs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
				return view('docs.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocRequest $request)
    {
        $doc = Doc::create($request->all());
				$doc->users()->sync($request->users,false);
				Session::flash('success','doc  successfully created');
				return redirect()->route('docs.show',$doc->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doc $doc)
    {
        return view('docs.show',compact('doc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doc $doc)
    {
        $users = User::pluck('name','id');
				return view('docs.edit',compact('users','doc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocRequest $request,Doc $doc)
    {
        $doc->update($request->all());
				$doc->users()->sync($request->users);
				Session::flash('success','doc  successfully updated');
				return redirect()->route('docs.show',$doc->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doc $doc)
    {
        $doc->users()->detach();
				$doc->facilities()->delete();
				$doc->delete();
				Session::flash('success','doc  successfully deleted');
				return redirect()->route('docs.index');
    }
}
