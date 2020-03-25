<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}"> <!--Este token no se usa pero se pone para que no aparezca un error en la consola del navegador -->
	<meta name="author" content="Mauricio Ortiz">
	<link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}"> <!-- usando versiones de laravel mix para que el navegador no busque en su cache cada vez que se carga el script-->
	<script type="{{ mix('js/app.js') }}" defer></script><!--El atributo defer hace que se ejecuten los scrips al final de la carga -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
</head>
<body>
	<div id="app" class="d-flex flex-column h-screen"> <!-- El parametro 'app' no se usa pero se pone dentro de un div  para que la consola del navegador no muestre un error. Justify-content-between separa los elementos en espacios iguale. La clase h-screen se creo para que el div ocupe todo el alto de la pantalla -->
		<header>
			@include('partials/nav')
			@include('partials.msj-flash-exito') {{-- mostrando los mensajes de exito --}}
			@include('partials.msj-flash-error') {{-- mostrando los mensajes de error de validacion--}}
		</header>

		<main class="py-4">
			@yield('content')
		</main>

		<footer class="bg-dark text-center text-white-50 py-3 shadow-lg page-footer mt-auto"><!-- 'page-footer' y 'mt-auto' para posicionar el footer al final de la pagina sin que sea fixed. Si se quiere que sea fixed se usa 'fixed-bottom' -->
			{{ config('app.name') }} | Teleperformance El Salvador {{ date('Y') }}
		</footer>
	</div>
	<script src="{{ asset('js/app.js') }}"></script> <!-- Para que funcione los dropdown menus del navbar-->
</body>
</html>