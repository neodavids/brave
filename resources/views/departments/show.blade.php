@extends('layouts.app')

@section('content')
	@component('components.departments.show',['department'=>$department])
	@endcomponent
@endsection