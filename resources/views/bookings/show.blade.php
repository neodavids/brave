@extends('layouts.app')

@section('content')
	@component('components.bookings.show',['booking'=>$booking])
	@endcomponent
@endsection