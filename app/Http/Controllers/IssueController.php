<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use Session;
use Auth;
use App\Issue;
use App\User;


class IssueController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>array('index','show')]);
    $this->authorizeResource(Issue::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::paginate('10');
				return view('issues.index',compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
				return view('issues.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIssueRequest $request)
    {
        $issue = Issue::create($request->all());
				$issue->users()->sync($request->users,false);
				Session::flash('success','issue  successfully created');
				return redirect()->route('issues.show',$issue->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return view('issues.show',compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        $users = User::pluck('name','id');
				return view('issues.edit',compact('users','issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIssueRequest $request,Issue $issue)
    {
        $issue->update($request->all());
				$issue->users()->sync($request->users);
				Session::flash('success','issue  successfully updated');
				return redirect()->route('issues.show',$issue->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->users()->detach();
				$issue->departments()->delete();
				$issue->delete();
				Session::flash('success','issue  successfully deleted');
				return redirect()->route('issues.index');
    }
}
