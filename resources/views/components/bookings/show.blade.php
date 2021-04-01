<div>
	<h3><a href="{{route('bookings.show',$booking->id)}}">{{$booking->user}}</a></h3>
	{{ $booking->date }}
	{{ $booking->start_time }}
	{{ $booking->end_time }}
	{{ $booking->meeting_description }}
	{{ $booking->facility }}
	<br>
	@can ('update',$booking)
		<a class="ui mini button" href="{{route('bookings.edit',$booking->id)}}">edit</a>
		{!! Form::model($booking, ['route' => ['bookings.update', $booking->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>