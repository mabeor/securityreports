<script src='js/agregarBorrarLineas.js' defer></script>

@extends('layout')

@section('title','Crear inconsistencias de libros')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-11 mx-auto">
				<h2>Crear reporte de inconsistencias de libros</h2>
				<hr>
				<form method="POST" name="frmCombos" action="{{ route('inconsistencias.store') }}">
					@csrf
					<table id="eventos" class="table text-center rounded">
						<thead class="thead-dark">
							<tr>
					   			<th width="20%">Posicion</th>
					   			<th width="15%">Fecha</th>
					   			<th width="45%">Detalle de la inconsistencia</th>
					   			<th width="20%"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select name="Posicion[]" class="form-control form-control-sm" {{-- required --}}>
										<option selected disabled></option>
											@foreach($posiciones_edificios as $posicion)
												<option value="{{ $posicion ->ID_posicion }}">{{ $posicion ->Nombre_edificio }} - {{ $posicion ->Nombre_posicion }}</option>
											@endforeach
											</script>
									</select>
								</td>
								<td>
									<input class="form-control form-control-sm" type="date" name="Fecha[]" {{-- required --}} />
								</td>
								<td>
									<textarea class="form-control form-control-sm" rows="3" cols="70" maxlength="1500" name="Descripcion[]" {{-- required --}}></textarea>
								</td>
								<td>
									<input type="button" class="btn btn-outline-primary btn-sm btn-js boton-novedades" value="Agregar linea" onclick="agregarlinea(this);"><br><br>

									<input type="button" class="btn btn-outline-primary btn-sm btn-js boton-novedades" value="Borrar linea" onclick="borrarlinea();">
								</td>
							</tr>
						</tbody>
					</table>
					<button class="btn btn-primary btn-md btn-guardar">Guardar</button>
				</form>
			</div>
		</div>
	</div>
@endsection