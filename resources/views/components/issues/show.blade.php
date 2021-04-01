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
	<br>
	@can ('update',$issue)
		<a class="ui mini button" href="{{route('issues.edit',$issue->id)}}">edit</a>
		{!! Form::model($issue, ['route' => ['issues.update', $issue->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>