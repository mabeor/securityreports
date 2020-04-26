<tr>
	<td>
		<select id="edificio" name="Edificio[]" class="form-control form-control-sm" required>
			<option selected disabled></option>
			@foreach($edificios as $edificio)
				<option value="{{ $edificio ->ID_edificio }}">{{ $edificio ->Nombre_edificio }}</option>
			@endforeach
		</select>
	</td>
	<td>
		<select  id="cuenta" name="Cuenta[]" class="form-control form-control-sm" required>
			<option selected disabled></option>
			@foreach($campanas as $campana)
				<option value="{{ $campana ->ID_cuenta }}">{{ $campana ->Nombre_cuenta }}</option>
			@endforeach
		</select>
	</td>
	<td>
		<input type="datetime-local" id="Hora" name="Hora[]" class="form-control form-control-sm" required>
	</td>
	<td>
		<input type="button" class="btn btn-outline-primary btn-sm btn-js" value="Agregar linea" onclick="agregarlinea(this);" />
		&nbsp;
		<input type="button" class="btn btn-outline-primary btn-sm btn-js" value="Borrar linea" onclick="borrarlinea();" />
	</td>
</tr>