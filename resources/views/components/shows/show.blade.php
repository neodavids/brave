<div>
	<h3><a href="{{route('shows.show',$show->id)}}">{{$show->user}}</a></h3>
	{{ $show->date }}
	{{ $show->show_description }}
	{{ $show->studio }}
	{{ $show->start_time }}
	{{ $show->end_time }}
	<br>
	@can ('update',$show)
		<a class="ui mini button" href="{{route('shows.edit',$show->id)}}">edit</a>
		{!! Form::model($show, ['route' => ['shows.update', $show->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>