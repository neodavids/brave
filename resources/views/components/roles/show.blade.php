<div>
	<h3><a href="{{route('roles.show',$role->slug)}}">{{$role->name}}</a></h3>
	<br>
	@can ('update',$role)
		<a class="ui mini button" href="{{route('roles.edit',$role->slug)}}">edit</a>
		{!! Form::model($role, ['route' => ['roles.update', $role->slug], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>