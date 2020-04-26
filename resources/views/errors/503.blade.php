@extends('errors::minimal')

@section('title', __('Servicio no disponible'))
@section('code', 'Error 503')
@section('message', __('Servicio no disponible.'))

@section('imagen')
		<style>
	            body {
	                background-image: url("/img/503.jpg");
	                background-position: 90% 20%;
	                color: #fff;
	            }
		</style>
@endsection