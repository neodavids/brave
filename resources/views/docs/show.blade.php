@extends('layouts.app')

@section('content')
	@component('components.docs.show',['doc'=>$doc])
	@endcomponent
@endsection