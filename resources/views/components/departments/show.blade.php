<div>
	<h3><a href="{{route('departments.show',$department->id)}}">{{$department->name}}</a></h3>
	{{ $department->head_of_department }}
	<br>
	@can ('update',$department)
		<a class="ui mini button" href="{{route('departments.edit',$department->id)}}">edit</a>
		{!! Form::model($department, ['route' => ['departments.update', $department->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>