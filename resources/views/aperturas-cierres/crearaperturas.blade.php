 <script type="text/javascript">
	function agregarlinea(n){
		//duplicando la linea de la tabla
		var tr = n.parentNode.parentNode.cloneNode(true);
    	document.getElementById('eventos').appendChild(tr);
	}

	function borrarlinea() {
		// event.target will be the input element.
		var td = event.target.parentNode;
		var tr = td.parentNode; // the row to be removed
		tr.parentNode.removeChild(tr);
	}

	function Validacion_de_Selects(){
		{{-- Estos scripts permiten que se le diga al usuario que tiene que llenar estos campos sin que se refresque el sitio y no pierda asi los datos ya ingresados--}}

		//se valida cada select de los edificios de cada linea con base en los indice del arreglo
		var Edificio = document.getElementsByName('Edificio[]');
		for (i=0; i < Edificio.length; i++){
			if (Edificio[i].value == "seleccione el edificio"){
			 	 alert('Seleccione un edificio');
			 	 return false;
			}
		}

		//se valida cada select de las cuentas de cada linea con base en los indice del arreglo
		var Cuenta = document.getElementsByName('Cuenta[]');
		for (j=0; j < Cuenta.length; j++){
			if (Cuenta[j].value == "seleccione la cuenta"){
			 	 alert('Seleccione una cuenta');
			 	 return false;
			}
		}
    }
 </script>

@extends('layout')

@section('title','Crear aperturas de cuenta')

@section('content')
	<h1>Crear aperturas de cuenta</h1>
	<hr>

	@include('partials.validation-errors') {{-- mostrando los mensajes de error de validacion--}}

	{{-- mostrando el mensaje flash de confirmacion de la insercion de los datos en la BD --}}
	@if(session('status'))
		{{ session('status') }}
	@endif

	<form method="POST" action="{{ route('aperturas.store') }}" onSubmit="return Validacion_de_Selects();">
		@csrf
		<table id="eventos">
			<thead>
				<tr>
					<th>Edificio</th>
		   			<th>Cuenta</th>
		   			<th>Hora apertura</th>
		   			<th></th>
		   			<th></th>
				</tr>
			</thead>
			<tbody>
				@include('aperturas-cierres._tablerow')
			</tbody>
		</table>
		<button>Guardar</button>
	</form>
@endsection