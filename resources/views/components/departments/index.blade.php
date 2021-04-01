@if($departments->isNotEmpty())
	@foreach($departments as $department)
		<div>
			<h3><a href="{{route('departments.show',$department->id)}}">{{$department->name}}</a></h3>
			{{ $department->head_of_department }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$departments->links()}}
		@else
			{{$departments->appends($_GET)->links()}}
		@endif
@else
	<h3>No department items found</h3>
@endif