<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use Session;
use Auth;
use App\Message;
use App\User;


class MessageController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['except'=>array('index','show')]);
    $this->authorizeResource(Message::class,null,['except'=>array('index','show')]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::paginate('10');
				return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
				return view('messages.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $message = Message::create($request->all());
				$message->users()->sync($request->users,false);
				Session::flash('success','message  successfully created');
				return redirect()->route('messages.show',$message->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $users = User::pluck('name','id');
				return view('messages.edit',compact('users','message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request,Message $message)
    {
        $message->update($request->all());
				$message->users()->sync($request->users);
				Session::flash('success','message  successfully updated');
				return redirect()->route('messages.show',$message->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->users()->detach();
				$message->departments()->delete();
				$message->delete();
				Session::flash('success','message  successfully deleted');
				return redirect()->route('messages.index');
    }
}
