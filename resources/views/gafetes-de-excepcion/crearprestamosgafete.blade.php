<script src='js/agregarBorrarLineas.js' defer></script>

@extends('layout')

@section('title','Crear prestamos de gafete de excepcion')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 mx-auto">
				<h2>Crear pr&eacute;stamos de gafetes de excepci&oacute;n</h2>
				<hr>
				<form method="POST" action="{{ route('prestamosgafete.store') }}">
					@csrf
					<table id="eventos" class="table text-center rounded">
						<thead class="thead-dark">
							<tr>
								<th width="15%">Cuenta</th>
					   			<th width="15%">Tipo gafete</th>
					   			<th width="10%">No. gafete</th>
					   			<th width="20%">Nombre visita</th>
					   			<th width="20%">Nombre quien recibi&oacute;</th>
					   			<th width="5%">Fecha inicio</th>
					   			<th width="5%">Fecha fin</th>
					   			<th width="10%"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select name="Cuenta[]" class="form-control form-control-sm" required>
										<option selected disabled></option>
										@foreach($campanas as $campana)
											<option value="{{ $campana ->ID_cuenta }}">{{ $campana ->Nombre_cuenta }}</option>
										@endforeach
									</select>
								</td>
								<td>
									<select name="TipoGafete[]" class="form-control form-control-sm" required>
										<option selected disabled></option>
										<option value="Laptop, celular y tablet">Laptop, celular y tablet</option>
										<option value="Laptop">Laptop</option>
										<option value="Celular">Celular</option>
										<option value="Tablet">Tablet</option>
									</select>
								</td>
								<td>
									<input class="form-control form-control-sm" type="number" min="1" max="99" name="NumeroGafete[]" required />
								</td>
								<td>
									<input class="form-control form-control-sm" name="NombreVisita[]" required />
								</td>
								<td>
									<input class="form-control form-control-sm" name="NombreQuienRecibio[]" required />
								</td>
								<td>
									<input type="date" class="form-control form-control-sm" name="FechaInicio[]" required />
								</td>
								<td>
									<input type="date" class="form-control form-control-sm" name="FechaFin[]" required />
								</td>
								<td>
									<input type="button" class="btn btn-outline-primary btn-sm btn-js" id="btn-prestamos-agregar" value="+" title="Agregar linea" onclick="agregarlinea(this);">
									<input type="button" class="btn btn-outline-primary btn-sm btn-js" id="btn-prestamos-borrar" value="&#8211;" title="Borrar linea" onclick="borrarlinea();">
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