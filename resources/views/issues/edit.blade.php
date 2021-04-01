@extends('layouts.app')

@section('content')
	@component('components.issues.edit',['issue'=>$issue])
	@endcomponent
@endsection