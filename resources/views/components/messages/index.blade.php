@if($messages->isNotEmpty())
	@foreach($messages as $message)
		<div>
			<h3><a href="{{route('messages.show',$message->id)}}">{{$message->title}}</a></h3>
			{{ $message->body }}
			{{ $message->sender }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$messages->links()}}
		@else
			{{$messages->appends($_GET)->links()}}
		@endif
@else
	<h3>No message items found</h3>
@endif