<div>
	<h3><a href="{{route('messages.show',$message->id)}}">{{$message->title}}</a></h3>
	{{ $message->body }}
	{{ $message->sender }}
	<br>
	@can ('update',$message)
		<a class="ui mini button" href="{{route('messages.edit',$message->id)}}">edit</a>
		{!! Form::model($message, ['route' => ['messages.update', $message->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>