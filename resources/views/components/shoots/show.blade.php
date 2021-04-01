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
	<br>
	@can ('update',$shoot)
		<a class="ui mini button" href="{{route('shoots.edit',$shoot->id)}}">edit</a>
		{!! Form::model($shoot, ['route' => ['shoots.update', $shoot->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>