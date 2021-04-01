@extends('layouts.app')

@section('content')
	@component('components.shows.index',['shows'=>$shows])
	@endcomponent
@endsection