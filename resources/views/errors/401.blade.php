@extends('errors::minimal')

@section('title', __('Acceso no autorizado'))
@section('code', 'Error 401')
@section('message', __('No tienes autorizacion para ingresar a esta pagina.'))

@section('imagen')
		<style>
	            body {
	                background-image: url("/img/401.jpg");
	                background-position: 40% 30%;
	                color: #fff;
	            }
		</style>
@endsection
