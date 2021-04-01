<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use Session;
use Auth;
use App\Issue;
use App\Http\Resources\Issue as IssueResource;
use App\Http\Resources\IssueCollection;
use App\User;


class IssueController extends Controller
{
  public function __construct(){
    $this->middleware('auth:api',['except'=>array('index','show')]);
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
				return new IssueCollection($issues);
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
				return new IssueResource($issue);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return new IssueResource($issue);
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
				return new IssueResource($issue);
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
				return redirect()->route('issues.index');
    }
}
