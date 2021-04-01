@if($issues->isNotEmpty())
	@foreach($issues as $issue)
		<div>
			<h3><a href="{{route('issues.show',$issue->id)}}">{{$issue->item_name}}</a></h3>
			{{ $issue->description }}
			{{ $issue->date }}
			{{ $issue->location }}
			{{ $issue->raised_by }}
			{{ $issue->department }}
			{{ $issue->status }}
			{{ $issue->solved_by }}
			{{ $issue->action_taken }}
			{{ $issue->cause_of_breakdown }}
			{{ $issue->engineers_comment }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$issues->links()}}
		@else
			{{$issues->appends($_GET)->links()}}
		@endif
@else
	<h3>No issue items found</h3>
@endif