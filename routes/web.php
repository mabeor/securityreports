<?php

Route::middleware(['auth'])->group(function () { //se protegen todas las rutas con usuario y contrasena
	Route::view('/inicio', 'inicio') -> name ('inicio');//ruta de inicio despues de validar login, disponible para todos los usuarios
	Route::get('/', 'HomeController@index')->name('home');

	Route::middleware(['AccesoAdministrador'])->group(function () { //rutas disponibles solo para los administradores...
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		Route::post('register', 'Auth\RegisterController@register');
	});

	Route::middleware(['AccesoSupervisor'])->group(function () { //rutas disponibles solo para los supervisores y administradores...
		Route::get('/crear-aperturas', 'AperturasController@create') -> name ('aperturas.create');
		Route::post('/crear-aperturas', 'AperturasController@store') -> name ('aperturas.store');
		Route::get('/crear-cierres', 'CierresController@create') -> name ('cierres.create');
		Route::post('/crear-cierres', 'CierresController@store') -> name ('cierres.store');
		Route::get('/busqueda-de-aperturas', 'AperturasController@index') -> name ('aperturas.index');
		Route::post('/busqueda-de-aperturas', 'AperturasController@show') -> name ('aperturas.show');
		Route::get('/busqueda-de-cierres', 'CierresController@index') -> name ('cierres.index');
		Route::post('/busqueda-de-cierres', 'CierresController@show') -> name ('cierres.show');
	});

}); //fin de rutas protegidas con usuario contrasena

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Auth::routes(['reset' => false]);//deshabilitando el formulario de registro y el de reseteo de contrasena

