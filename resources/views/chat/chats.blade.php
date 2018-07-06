@extends('layouts.article')

@section('title'){{ Auth::user()->name }}的消息@stop


@section('content')
		<composer/>

		{{-- <passport-authorized-clients/> --}}
@stop