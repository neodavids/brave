@extends('layouts.app')

@section('content')
	@component('components.shows.edit',['show'=>$show])
	@endcomponent
@endsection