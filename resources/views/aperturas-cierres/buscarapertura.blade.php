@extends('layout')

@section('title','Buscar aperturas de cuenta')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-10 mx-auto">
				<h2>B&uacute;squeda de aperturas de cuenta</h2>
				<hr>
				<form method="POST" action="{{ route('aperturas.show') }}">
					@csrf
					<div class="inner-parent">
						<div style='text-align: right;' class="inner">
							<label for="edificio_id">Edificio</label><br>
							<label for="cuenta_id">Cuenta</label><br>
							<label for="fecha_desde_id">Desde</label><br>
							<label for="fecha_hasta_id">Hasta</label>
						</div>
						<div class="inner" style='text-align: left;'>
							<select class="form-control form-control-sm" id="edificio_id" name="Edificio">
								<option selected disabled value="seleccione el edificio">Seleccione</option>
								@foreach($edificios as $edificio)
									<option value="{{ $edificio ->ID_edificio }}">{{ $edificio ->Nombre_edificio }}</option>
								@endforeach
							</select>
							<select class="form-control form-control-sm" id="cuenta_id" name="Cuenta">
								<option selected disabled value="seleccione la cuenta">Seleccione</option>
								@foreach($campanas as $campana)
									<option value="{{ $campana ->ID_cuenta }}">{{ $campana ->Nombre_cuenta }}</option>
								@endforeach
							</select>
							<input class="form-control form-control-sm" type="date" id="fecha_desde_id" name="Fecha_desde" required>
							<input class="form-control form-control-sm" type="date" id="fecha_hasta_id" name="Fecha_hasta" required>
						</div>
						<button class="btn btn-primary btn-md btn-guardar">Buscar</button>
					</div>
				</form>

				@isset($Aperturas) {{-- Directiva para verificar si la variable $AperturasCierres existe, la cual unicamente existe cuando se envian los datos del formulario por el metodo POST--}}
				<hr>
					<table class="table text-center table-striped rounded">
						<thead class="thead-dark">
							<tr>
								<th>Edificio</th>
					   			<th>Cuenta</th>
					   			<th>Fecha de la apertura</th>
					   			<th>Creado por</th>
							</tr>
						</thead>
						<tbody>
							@foreach($Aperturas as $apertura)
								<tr>
									<td>{{ $apertura -> Nombre_edificio }}</td>
									<td>{{ $apertura -> Nombre_cuenta }}</td>
									<td>{{ date('d-M-Y', strtotime($apertura -> Fecha_apertura)) }}</td>
									<td>{{ $apertura -> name }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endisset
			</div>
		</div>
	</div>
 @endsection