@extends('layouts.app')

@section('content')
	@component('components.shows.show',['show'=>$show])
	@endcomponent
@endsection