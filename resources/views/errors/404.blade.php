@extends('errors::minimal')

@section('title', __('Pagina no encontrada'))
@section('code', 'Error 404')
@section('message', __('Pagina no encontrada.'))

@section('imagen')
		<style>
	            body {
	                background-image: url("/img/404.jpg");
	                background-position: 70% 30%;
	                color: #fff;
	            }
		</style>
@endsection