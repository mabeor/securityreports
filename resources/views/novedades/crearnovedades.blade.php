<script src='js/agregarBorrarLineas.js' defer></script>

@extends('layout')

@section('title','Crear novedades')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-11 mx-auto">
				<h2>Crear novedades</h2>
				<hr>
				<form method="POST" action="{{ route('novedades.store') }}">
					@csrf
					<table id="eventos" class="table text-center rounded">
						<thead class="thead-dark">
							<tr>
								<th width="10%">Edificio</th>
					   			<th width="15%">Tipo</th>
					   			<th width="20%">Fecha - hora novedad</th>
					   			<th width="45%">Descripci&oacute;n</th>
					   			<th width="10%"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select name="Edificio[]" class="form-control form-control-sm" required>
										<option selected disabled></option>
										@foreach($edificios as $edificio)
											<option value="{{ $edificio ->ID_edificio }}">{{ $edificio ->Nombre_edificio }}</option>
										@endforeach
									</select>
								</td>
								<td>
									<select name="Tipo[]" class="form-control form-control-sm" required>
										<option selected disabled></option>
										<option value="Perimetro">Perimetro</option>
										<option value="Interior">Interior</option>
									</select>
								</td>
								<td>
									<input class="form-control form-control-sm" type="datetime-local" name="Fecha[]" required />
								</td>
								<td>
									<textarea class="form-control form-control-sm" rows="3" cols="70" maxlength="1500" name="Descripcion[]" required></textarea>
								</td>
								<td>
									<input type="button" class="btn btn-outline-primary btn-sm btn-js boton-novedades" value="Agregar linea" onclick="agregarlinea(this);"><br>
									&nbsp;
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