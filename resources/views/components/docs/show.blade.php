<div>
	<h3><a href="{{route('docs.show',$doc->id)}}">{{$doc->title}}</a></h3>
	{{ $doc->download_link }}
	{{ $doc->last_updated }}
	<br>
	@can ('update',$doc)
		<a class="ui mini button" href="{{route('docs.edit',$doc->id)}}">edit</a>
		{!! Form::model($doc, ['route' => ['docs.update', $doc->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>