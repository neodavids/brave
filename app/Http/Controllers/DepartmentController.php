<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Session;
use Auth;
use App\Department;
use App\User;
use App\Issue;
use App\Show;
use App\Message;


class DepartmentController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>array('index','show')]);
    $this->authorizeResource(Department::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate('10');
				return view('departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
				$issues = Issue::pluck('item_name','id');
				$shows = Show::pluck('user','id');
				$messages = Message::pluck('title','id');
				return view('departments.create',compact('users','issues','shows','messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create($request->all());
				$department->users()->sync($request->users,false);
				$department->issues()->sync($request->issues,false);
				$department->shows()->sync($request->shows,false);
				$department->messages()->sync($request->messages,false);
				Session::flash('success','department  successfully created');
				return redirect()->route('departments.show',$department->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('departments.show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $users = User::pluck('name','id');
				$issues = Issue::pluck('item_name','id');
				$shows = Show::pluck('user','id');
				$messages = Message::pluck('title','id');
				return view('departments.edit',compact('users','issues','shows','messages','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request,Department $department)
    {
        $department->update($request->all());
				$department->users()->sync($request->users);
				$department->issues()->sync($request->issues);
				$department->shows()->sync($request->shows);
				$department->messages()->sync($request->messages);
				Session::flash('success','department  successfully updated');
				return redirect()->route('departments.show',$department->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->users()->detach();
				$department->issues()->detach();
				$department->shows()->detach();
				$department->messages()->detach();
				$department->delete();
				Session::flash('success','department  successfully deleted');
				return redirect()->route('departments.index');
    }
}
