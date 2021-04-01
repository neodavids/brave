@if($shows->isNotEmpty())
	@foreach($shows as $show)
		<div>
			<h3><a href="{{route('shows.show',$show->id)}}">{{$show->user}}</a></h3>
			{{ $show->date }}
			{{ $show->show_description }}
			{{ $show->studio }}
			{{ $show->start_time }}
			{{ $show->end_time }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$shows->links()}}
		@else
			{{$shows->appends($_GET)->links()}}
		@endif
@else
	<h3>No show items found</h3>
@endif