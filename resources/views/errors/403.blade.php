@extends('errors::minimal')

@section('title', __('Acceso no permitido'))
@section('code', 'Error 403')
@section('message', __('No tienes privilegios para ingresar a esta pagina.'))

@section('imagen')
		<style>
	            body {
	                background-image: url("/img/403.jpg");
	                background-position: 40% 30%;
	                color: #fff;
	            }
		</style>
@endsection
