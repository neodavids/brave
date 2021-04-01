@extends('layouts.app')

@section('content')
	@component('components.messages.show',['message'=>$message])
	@endcomponent
@endsection