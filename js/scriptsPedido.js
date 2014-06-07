function agregarPlato(){
	indice = document.getElementById("platos").selectedIndex;
	valor = document.getElementById("platos").options[indice].firstChild.nodeValue;
	var plato = document.getElementById("platos").value;
	var opcion = document.createElement("option");
	opcion.setAttribute("value",plato);
	opcion.setAttribute("onClick","removerPlato()");
	
	var contenido = document.createTextNode(valor);
	opcion.appendChild(contenido);
	
	var lista = document.getElementById("listaPlatos");
	lista.appendChild(opcion);
}

function removerPlato(){
	var plato = document.getElementById("listaPlatos").value;
	var lista = document.getElementById("listaPlatos");
	alert(plato);
	plato.parentNode.removeChild(plato);
	//lista.removeChild(plato);
}