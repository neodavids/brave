<div>
	<h3><a href="{{route('facilities.show',$facility->id)}}">{{$facility->name}}</a></h3>
	{{ $facility->type }}
	{{ $facility->description }}
	<br>
	@can ('update',$facility)
		<a class="ui mini button" href="{{route('facilities.edit',$facility->id)}}">edit</a>
		{!! Form::model($facility, ['route' => ['facilities.update', $facility->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>