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