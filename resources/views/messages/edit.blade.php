@extends('layouts.app')

@section('content')
	@component('components.messages.edit',['message'=>$message])
	@endcomponent
@endsection