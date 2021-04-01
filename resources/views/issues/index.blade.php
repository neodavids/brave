@extends('layouts.app')

@section('content')
	@component('components.issues.index',['issues'=>$issues])
	@endcomponent
@endsection