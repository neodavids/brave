<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocRequest;
use App\Http\Requests\UpdateDocRequest;
use Session;
use Auth;
use App\Doc;
use App\Http\Resources\Doc as DocResource;
use App\Http\Resources\DocCollection;
use App\User;


class DocController extends Controller
{
  public function __construct(){
    $this->middleware('auth:api',['except'=>array('index','show')]);
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
				return new DocCollection($docs);
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
				return new DocResource($doc);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doc $doc)
    {
        return new DocResource($doc);
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
				return new DocResource($doc);
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
				return redirect()->route('docs.index');
    }
}
