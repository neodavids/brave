@extends('layouts.app')

@section('content')
	@component('components.issues.show',['issue'=>$issue])
	@endcomponent
@endsection