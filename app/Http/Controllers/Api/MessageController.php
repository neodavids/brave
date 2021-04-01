<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use Session;
use Auth;
use App\Message;
use App\Http\Resources\Message as MessageResource;
use App\Http\Resources\MessageCollection;
use App\User;


class MessageController extends Controller
{
  public function __construct(){
    $this->middleware('auth:api',['except'=>array('index','show')]);
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
				return new MessageCollection($messages);
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
				return new MessageResource($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return new MessageResource($message);
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
				return new MessageResource($message);
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
				return redirect()->route('messages.index');
    }
}
