@extends('layout')

@section('title','Buscar prestamos de gafetes de excepcion')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 mx-auto">
				<h2>B&uacute;squeda de pr&eacute;stamos de gafetes de excepci&oacute;n</h2>
				<hr>
				<form method="POST" action="{{ route('prestamosgafete.show') }}">
					@csrf
					<div class="inner-parent">
						<div style='text-align: right;' class="inner">
							<label for="fecha_desde_id">Desde</label><br>
							<label for="fecha_hasta_id">Hasta</label><br>
						</div>
						<div class="inner" style='text-align: left;'>
							<input class="form-control form-control-sm" type="date" id="fecha_desde_id" name="Fecha_desde" required />
							<input class="form-control form-control-sm" type="date" id="fecha_hasta_id" name="Fecha_hasta" required />
						</div><br>
						<button class="btn btn-primary btn-md btn-guardar">Buscar</button>
					</div>
				</form>

				{{-- <form method="post" action="{{ route('prestamosgafete.MesAnterior') }}">
					<button type="submit" class="btn btn-success" id="btn-prestamos-mes" >Prestamos mes anterior</button>
				</form> --}}

				@isset($Prestamos) {{-- Directiva para verificar si la variable $AperturasCierres existe, la cual unicamente existe cuando se envian los datos del formulario por el metodo POST--}}
				<hr>
					<table class="table text-center table-striped rounded">
						<thead class="thead-dark">
							<tr>
								<th width="">Cuenta</th>
					   			<th width="">Tipo gafete</th>
					   			<th width="">No. gafete</th>
					   			<th width="">Nombre visita</th>
					   			<th width="">Nombre quien recibio</th>
					   			<th width="">Fecha inicio</th>
					   			<th width="">Fecha fin</th>
					   			<th width="">Creado por</th>
							</tr>
						</thead>
						<tbody>
							@foreach($Prestamos as $prestamo)
								<tr>
									<td>{{ $prestamo -> Nombre_cuenta }}</td>
									<td>{{ $prestamo -> Tipo_gafete }}</td>
									<td>{{ $prestamo -> Numero_gafete }}</td>
									<td>{{ $prestamo -> Nombre_visita }}</td>
									<td>{{ $prestamo -> Nombre_quien_recibio }}</td>
									<td>{{ date('d-M-Y', strtotime($prestamo -> Fecha_inicio)) }}</td>
									<td>{{ date('d-M-Y', strtotime($prestamo -> Fecha_fin)) }}</td>
									<td>{{ $prestamo -> name }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@endisset
			</div>
		</div>
	</div>
 @endsection