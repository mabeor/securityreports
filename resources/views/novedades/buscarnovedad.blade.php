@extends('layout')

@section('title','Buscar novedades')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 mx-auto">
				<h2>B&uacute;squeda de novedades</h2>
				<hr>
				<form method="POST" action="{{ route('novedades.show') }}">
					@csrf
					<div class="inner-parent">
						<div style='text-align: right;' class="inner">
							<label for="edificio_id">Edificio</label><br>
							<label for="tipo_id">Tipo</label><br>
							<label for="fecha_desde_id">Fecha desde</label><br>
							<label for="fecha_hasta_id">Fecha hasta</label><br>
						</div>
						<div class="inner" style='text-align: left;'>
							<select class="form-control form-control-sm" id="edificio_id" name="Edificio">
								<option selected disabled value="seleccione el edificio">Seleccione</option>
								@foreach($edificios as $edificio)
									<option value="{{ $edificio ->ID_edificio }}">{{ $edificio ->Nombre_edificio }}</option>
								@endforeach
							</select>
							<select class="form-control form-control-sm" id="tipo_id" name="Tipo">
								<option selected disabled value="Seleccione el tipo">Seleccione</option>
								<option value="Perimetro">Perimetro</option>
								<option value="Interior">Interior</option>
							</select>
							<input class="form-control form-control-sm" type="date" id="fecha_desde_id" name="Fecha_desde" required>
							<input class="form-control form-control-sm" type="date" id="fecha_hasta_id" name="Fecha_hasta" required>
						</div>
						<button class="btn btn-primary btn-md btn-guardar">Buscar</button>
					</div>
				</form>

				@isset($Novedades) {{-- Directiva para verificar si la variable $AperturasCierres existe, la cual unicamente existe cuando se envian los datos del formulario por el metodo POST--}}
				<hr>
					<table class="table text-center table-striped rounded">
						<thead class="thead-dark">
							<tr>
								<th width="10%">Edificio</th>
					   			<th width="10%">Tipo</th>
					   			<th width="20%">Fecha - Hora</th>
					   			<th width="45%">Descripci&oacute;n</th>
					   			<th width="15%">Creado por</th>
							</tr>
						</thead>
						<tbody>
							@foreach($Novedades as $novedad)
								<tr>
									<td>{{ $novedad -> Nombre_edificio }}</td>
									<td>{{ $novedad -> Tipo }}</td>
									<td>{{ date('d-M-Y - H:i', strtotime($novedad -> Fecha_novedad)) }}</td>
									<td>{{ $novedad -> Descripcion }}</td>
									<td>{{ $novedad -> name }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endisset
			</div>
		</div>
	</div>
 @endsection