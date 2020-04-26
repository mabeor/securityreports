<?php

Route::middleware(['auth'])->group(function () { //se protegen todas las rutas con usuario y contrasena
	Route::view('/inicio', 'inicio') -> name ('inicio');//ruta de inicio despues de validar login, disponible para todos los usuarios
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('cambiar-contrasena', 'ChangePasswordController@index')->name('cambiarcontra');
	Route::patch('cambiar-contrasena', 'ChangePasswordController@store')->name('change.password');

	Route::middleware(['AccesoAdministrador'])->group(function () { //rutas disponibles solo para los administradores...
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		Route::post('register', 'Auth\RegisterController@register');
		Route::get('/busqueda-de-aperturas', 'AperturasController@index') -> name ('aperturas.index');
		Route::post('/busqueda-de-aperturas', 'AperturasController@show') -> name ('aperturas.show');
		Route::get('/busqueda-de-cierres', 'CierresController@index') -> name ('cierres.index');
		Route::post('/busqueda-de-cierres', 'CierresController@show') -> name ('cierres.show');
		Route::get('/busqueda-de-novedades', 'NovedadesController@index') -> name ('novedades.index');
		Route::post('/busqueda-de-novedades', 'NovedadesController@show') -> name ('novedades.show');
		Route::get('/busqueda-de-prestamos-de-gafetes-de-excepcion', 'PrestamosGafetesController@index') -> name ('prestamosgafete.index');
		Route::post('/busqueda-de-prestamos-de-gafetes-de-excepcion', 'PrestamosGafetesController@show') -> name ('prestamosgafete.show');
		Route::get('/busqueda-de-inconsistencias-de-libros', 'InconsistenciasController@index') -> name ('inconsistencias.index');
		Route::post('/busqueda-de-inconsistencias-de-libros', 'InconsistenciasController@show') -> name ('inconsistencias.show');
		Route::get('/estadisticas-de-inconsistencias-de-libros', 'InconsistenciasController@estadisticas') -> name ('inconsistencias.estadisticas');
	});

	Route::middleware(['AccesoSupervisor'])->group(function () { //rutas disponibles solo para los supervisores y administradores...
		Route::get('/crear-aperturas', 'AperturasController@create') -> name ('aperturas.create');
		Route::post('/crear-aperturas', 'AperturasController@store') -> name ('aperturas.store');
		Route::get('/crear-cierres', 'CierresController@create') -> name ('cierres.create');
		Route::post('/crear-cierres', 'CierresController@store') -> name ('cierres.store');
		Route::get('/crear-novedades', 'NovedadesController@create') -> name ('novedades.create');
		Route::post('/crear-novedades', 'NovedadesController@store') -> name ('novedades.store');
	});

	Route::middleware(['AccesoCoordinador'])->group(function () { //rutas disponibles solo para los coordinadores y administradores...
		Route::get('/crear-prestamos-gafetes', 'PrestamosGafetesController@create') -> name ('prestamosgafete.create');
		Route::post('/crear-prestamos-gafetes', 'PrestamosGafetesController@store') -> name ('prestamosgafete.store');
	});

	Route::middleware(['AccesoTodos'])->group(function () {
		Route::get('/crear-inconsistencias-de-libros', 'InconsistenciasController@create') -> name ('inconsistencias.create');
		Route::post('/crear-inconsistencias-de-libros', 'InconsistenciasController@store') -> name ('inconsistencias.store');
	});
}); //fin de rutas protegidas con usuario contrasena

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Auth::routes(['reset' => false]);//deshabilitando el formulario de registro y el de reseteo de contrasena

