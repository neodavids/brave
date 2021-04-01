@extends('layouts.app')

@section('content')
	@component('components.facilities.edit',['facility'=>$facility])
	@endcomponent
@endsection