@extends('layouts.app')

@section('content')
	@component('components.docs.edit',['doc'=>$doc])
	@endcomponent
@endsection