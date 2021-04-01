@extends('layouts.app')

@section('content')
	@component('components.shoots.edit',['shoot'=>$shoot])
	@endcomponent
@endsection