@extends('layouts.app')

@section('content')
	@component('components.shoots.show',['shoot'=>$shoot])
	@endcomponent
@endsection