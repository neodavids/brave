@extends('layouts.app')

@section('content')
	@component('components.departments.edit',['department'=>$department])
	@endcomponent
@endsection