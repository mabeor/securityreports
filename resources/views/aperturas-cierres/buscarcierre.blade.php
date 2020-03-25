@extends('layout')

@section('title','Buscar cierres de cuenta')

@section('content')
	<h1>Busqueda de cierres de cuenta</h1>
	<hr>

	@include('partials.validation-errors'){{-- mostrando los mensajes de error de validacion--}}

	<form method="POST" action="{{ route('cierres.show') }}">
		@csrf
		<label for="edificio_id">Edificio</label>
		<select  id="edificio_id" name="Edificio[]">
			<option selected disabled value="seleccione el edificio">Seleccione</option>
			<option value="TP1">TP1</option>
			<option value="TP2">TP2</option>
			<option value="TP3">TP3</option>
			<option value="TP4">TP4</option>
			<option value="TP5">TP5</option>
			<option value="TP6">TP6</option>
		</select><br>

		<label for="cuenta_id">Cuenta</label>
		<select  id="cuenta_id" name="Cuenta[]">
			<option selected disabled value="seleccione la cuenta">Seleccione</option>
			@foreach($campanas as $campana)
				<option value="{{ $campana ->Nombre_cuenta }}">{{ $campana ->Nombre_cuenta }}</option>
			@endforeach
		</select><br>

		<label for="fecha_desde_id">Desde</label>
		<input type="date" id="fecha_desde_id" name="Fecha_desde" required><br>

		<label for="fecha_hasta_id">Hasta</label>
		<input type="date" id="fecha_hasta_id" name="Fecha_hasta" required><br>

		<button>Buscar</button>
	</form>

	@isset($Cierres) {{-- Directiva para verificar si la variable $AperturasCierres existe, la cual unicamente existe cuando se envian los datos del formulario por el metodo POST--}}
	<hr>
		<table>
			<thead>
				<tr>
					<th>Edificio</th>
		   			<th>Cuenta</th>
		   			<th>Fecha del cierre</th>
		   			<th>Creado por</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Cierres as $cierre)
					<tr>
						<td>{{ $cierre -> Edificio }}</td>
						<td>{{ $cierre -> Cuenta }}</td>
						<td>{{ $cierre -> Fecha_cierre }}</td>
						<td>{{ $cierre -> Creado_por }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endisset
 @endsection