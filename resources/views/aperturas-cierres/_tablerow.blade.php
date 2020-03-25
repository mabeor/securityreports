<tr>
	<td>
		<select  id="edificio" name="Edificio[]" required">
			<option selected disabled value="seleccione el edificio">Seleccione</option>
			<option value="TP1">TP1</option>
			<option value="TP2">TP2</option>
			<option value="TP3">TP3</option>
			<option value="TP4">TP4</option>
			<option value="TP5">TP5</option>
			<option value="TP6">TP6</option>
		</select>
	</td>
	<td>
		<select  id="cuenta" name="Cuenta[]" required>
			<option selected disabled value="seleccione la cuenta">Seleccione</option>
			@foreach($campanas as $campana)
				<option value="{{ $campana ->Nombre_cuenta }}">{{ $campana ->Nombre_cuenta }}</option>
			@endforeach
		</select>
	</td>
	<td>
		<input type="time" name="Hora[]" required>
	</td>
	<td>
		<input type="button" class="button" value="Agregar linea" onclick="agregarlinea(this);" />
	</td>
	<td>
		<input type="button" class="button" value="Borrar linea" onclick="borrarlinea();" />
	</td>
</tr>