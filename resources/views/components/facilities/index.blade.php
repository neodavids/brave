@if($facilities->isNotEmpty())
	@foreach($facilities as $facility)
		<div>
			<h3><a href="{{route('facilities.show',$facility->id)}}">{{$facility->name}}</a></h3>
			{{ $facility->type }}
			{{ $facility->description }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$facilities->links()}}
		@else
			{{$facilities->appends($_GET)->links()}}
		@endif
@else
	<h3>No facility items found</h3>
@endif