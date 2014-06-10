function agregarPlato(){
	indice = document.getElementById("platos").selectedIndex;
	valor = document.getElementById("platos").options[indice].firstChild.nodeValue;
	var cantidad = document.getElementById("cantidadPlato").value
	
	var valoresPlato = document.getElementById("platos").value.split("-");
	var plato = valoresPlato[0];
	var precio = valoresPlato[1];
	
	total = total + (cantidad*precio);
	
	var precioTotal = document.getElementById("precioTotal");
	precioTotal.innerHTML = total;
	
	var opcion = document.createElement("option");
	opcion.setAttribute("value",plato+"-"+cantidad);
	opcion.setAttribute("onClick","removerPlato()");
	opcion.setAttribute("selected",true);
	
	var contenido = document.createTextNode(cantidad+" - "+valor);
	opcion.appendChild(contenido);
	
	var lista = document.getElementById("listaPlatos");
	lista.appendChild(opcion);
}

function agregarAdicional(){
	indice = document.getElementById("adicionales").selectedIndex;
	valor = document.getElementById("adicionales").options[indice].firstChild.nodeValue;
	var cantidad = document.getElementById("cantidadAdicional").value
	
	var valoresPlato = document.getElementById("adicionales").value.split("-");
	var plato = valoresPlato[0];
	var precio = valoresPlato[1];
	
	total = total + (cantidad*precio);
	
	var precioTotal = document.getElementById("precioTotal");
	precioTotal.innerHTML = total;
	
	var opcion = document.createElement("option");
	opcion.setAttribute("value",plato+"-"+cantidad);
	//opcion.setAttribute("onClick","removerPlato()");
	opcion.setAttribute("selected",true);
	
	var contenido = document.createTextNode(cantidad+" - "+valor);
	opcion.appendChild(contenido);
	
	var lista = document.getElementById("listaAdicionales");
	lista.appendChild(opcion);
}

function removerPlato(){
	var plato = document.getElementById("listaPlatos").value;
	var lista = document.getElementById("listaPlatos");
	//alert(plato);
	plato.parentNode.removeChild(plato);
	//lista.removeChild(plato);
}