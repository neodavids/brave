@extends('layouts.app')

@section('content')
	@component('components.docs.index',['docs'=>$docs])
	@endcomponent
@endsection