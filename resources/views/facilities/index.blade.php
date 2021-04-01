@extends('layouts.app')

@section('content')
	@component('components.facilities.index',['facilities'=>$facilities])
	@endcomponent
@endsection