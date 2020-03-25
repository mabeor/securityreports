@extends('errors::minimal')

@section('title', __('Error del servidor'))
@section('code', 'Error 500')
@section('message', __('Error del servidor.'))

@section('imagen')
		<style>
	            body {
	                background-image: url("/img/500.jpg");
	                background-position: 90% 60%;
	                color: #fff;
	            }
		</style>
@endsection