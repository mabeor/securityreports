<script src='js/agregarBorrarLineas.js' defer></script>

@extends('layout')

@section('title','Crear cierres de cuenta')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-8 mx-auto">
				<h2>Crear cierres de cuenta</h2>
				<hr>
				<form method="POST" action="{{ route('cierres.store') }}">
					@csrf
					<table id="eventos" class="table text-center rounded">
						<thead class="thead-dark">
							<tr>
								<th>Edificio</th>
					   			<th>Cuenta</th>
					   			<th>Fecha - Hora cierre</th>
					   			<th></th>
					   			<th></th>
							</tr>
						</thead>
						<tbody>
							@include('aperturas-cierres._tablerow')
						</tbody>
					</table>
					<button class="btn btn-primary btn-md btn-guardar">Guardar</button>
				</form>
			</div>
		</div>
	</div>
@endsection