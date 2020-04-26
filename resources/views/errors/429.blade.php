@extends('errors::minimal')

@section('title', __('Demasiadas solicitudes'))
@section('code', 'Error 429')
@section('message', __('Demasiadas solicitudes al servidor.'))

@section('imagen')
		<style>
	            body {
	                background-image: url("/img/429.jpg");
	                background-position: 40% 60%;
	                color: #fff;
	            }
		</style>
@endsection