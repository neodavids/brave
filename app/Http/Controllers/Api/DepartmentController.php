<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Session;
use Auth;
use App\Department;
use App\Http\Resources\Department as DepartmentResource;
use App\Http\Resources\DepartmentCollection;
use App\User;
use App\Issue;
use App\Show;
use App\Message;


class DepartmentController extends Controller
{
  public function __construct(){
    $this->middleware('auth:api',['except'=>array('index','show')]);
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
				return new DepartmentCollection($departments);
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
				return new DepartmentResource($department);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return new DepartmentResource($department);
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
				return new DepartmentResource($department);
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
				return redirect()->route('departments.index');
    }
}
