@extends('layouts.app')

@section('content')
	@component('components.departments.index',['departments'=>$departments])
	@endcomponent
@endsection