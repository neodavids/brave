@extends('layouts.app')

@section('content')
	@component('components.facilities.show',['facility'=>$facility])
	@endcomponent
@endsection