@extends('errors::minimal')

@section('title', __('Pagina expirada'))
@section('code', 'Error 419')
@section('message', __('La pagina ha expirado. Vuelve a iniciar sesion.'))

@section('imagen')
		<style>
	            body {
	                background-image: url("/img/419.jpg");
	                background-position: 90% 40%;
	                color: #fff;
	            }
		</style>
@endsection