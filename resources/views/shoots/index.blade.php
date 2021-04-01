@extends('layouts.app')

@section('content')
	@component('components.shoots.index',['shoots'=>$shoots])
	@endcomponent
@endsection