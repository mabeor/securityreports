@extends('layout')

@section('title','Buscar inconsistencias de libros')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 mx-auto">
				<h2>B&uacute;squeda de inconsistencias de libros</h2>
				<hr>
				<form method="POST" action="{{ route('inconsistencias.show') }}">
					@csrf
					<div class="inner-parent">
						<div style='text-align: right;' class="inner">
							<label for="edificio_id">Posici&oacute;n</label><br>
							<label for="fecha_desde_id">Fecha desde</label><br>
							<label for="fecha_hasta_id">Fecha hasta</label><br>
						</div>
						<div class="inner" style='text-align: left;'>
							<select class="form-control form-control-sm" id="edificio_id" name="Posicion">
								<option selected disabled value="seleccione la posicion">Seleccione</option>
								@foreach($posiciones_edificios as $posicion)
									<option value="{{ $posicion ->ID_posicion }}">{{ $posicion ->Nombre_edificio }} - {{ $posicion ->Nombre_posicion }}</option>
								@endforeach
							</select>
							<input class="form-control form-control-sm" type="date" id="fecha_desde_id" name="Fecha_desde" required>
							<input class="form-control form-control-sm" type="date" id="fecha_hasta_id" name="Fecha_hasta" required>
						</div>
						<button class="btn btn-primary btn-md btn-guardar">Buscar</button>
					</div>
				</form>

				@isset($Inconsistencias) {{-- Directiva para verificar si la variable $AperturasCierres existe, la cual unicamente existe cuando se envian los datos del formulario por el metodo POST--}}
				<hr>
					<table class="table text-center table-striped rounded">
						<thead class="thead-dark">
							<tr>
								<th width="20%">Posicion</th>
					   			<th width="10%">Fecha</th>
					   			<th width="55%">Descripci&oacute;n</th>
					   			<th width="15%">Creado por</th>
							</tr>
						</thead>
						<tbody>
							@foreach($Inconsistencias as $inconsistencia)
								<tr>
									<td>{{ $inconsistencia -> Nombre_edificio }} - {{ $inconsistencia -> Nombre_posicion }}</td>
									<td>{{ date('d - M - Y', strtotime($inconsistencia -> Fecha_inconsistencia)) }}</td>
									<td>{{ $inconsistencia -> Descripcion }}</td>
									<td>{{ $inconsistencia -> name }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endisset
			</div>
		</div>
	</div>
 @endsection