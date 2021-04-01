@if($docs->isNotEmpty())
	@foreach($docs as $doc)
		<div>
			<h3><a href="{{route('docs.show',$doc->id)}}">{{$doc->title}}</a></h3>
			{{ $doc->download_link }}
			{{ $doc->last_updated }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$docs->links()}}
		@else
			{{$docs->appends($_GET)->links()}}
		@endif
@else
	<h3>No doc items found</h3>
@endif