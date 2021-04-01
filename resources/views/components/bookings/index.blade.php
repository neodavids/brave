@if($bookings->isNotEmpty())
	@foreach($bookings as $booking)
		<div>
			<h3><a href="{{route('bookings.show',$booking->id)}}">{{$booking->user}}</a></h3>
			{{ $booking->date }}
			{{ $booking->start_time }}
			{{ $booking->end_time }}
			{{ $booking->meeting_description }}
			{{ $booking->facility }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$bookings->links()}}
		@else
			{{$bookings->appends($_GET)->links()}}
		@endif
@else
	<h3>No booking items found</h3>
@endif