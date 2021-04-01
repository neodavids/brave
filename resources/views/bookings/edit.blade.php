@extends('layouts.app')

@section('content')
	@component('components.bookings.edit',['booking'=>$booking])
	@endcomponent
@endsection