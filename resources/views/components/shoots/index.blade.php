@if($shoots->isNotEmpty())
	@foreach($shoots as $shoot)
		<div>
			<h3><a href="{{route('shoots.show',$shoot->id)}}">{{$shoot->name}}</a></h3>
			{{ $shoot->start_date }}
			{{ $shoot->end_date }}
			{{ $shoot->status }}
			{{ $shoot->producer_1 }}
			{{ $shoot->producer_2 }}
			{{ $shoot->producer_3 }}
			{{ $shoot->producer_4 }}
			{{ $shoot->description }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$shoots->links()}}
		@else
			{{$shoots->appends($_GET)->links()}}
		@endif
@else
	<h3>No shoot items found</h3>
@endif