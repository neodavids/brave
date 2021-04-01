@extends('layouts.app')

@section('content')
	@component('components.messages.index',['messages'=>$messages])
	@endcomponent
@endsection