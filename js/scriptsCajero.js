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

function registrarPedido() {
 
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("respuesta_pedido").innerHTML=xmlhttp.responseText;
      }
    }

  var fecha = $("#fecha").val();
  var estado = $("#estado").val();
  var tipoPago = $("#tipoPago").val();
  var listaPlatos = $("#listaPlatos").val();
  var listaAdicionales = $("#listaAdicionales").val();
 
    xmlhttp.open("GET","../Controlador/ControllerPedido.php?fecha="+fecha+"&estado="+estado+"&tipoPago="+tipoPago+"&listaPlatos="+listaPlatos+"&listaAdicionales="+listaAdicionales,true);
    xmlhttp.send();
}

function consultarPlatos(){

	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("platos").innerHTML=xmlhttp.responseText;
      }
    }

    var idEmpresa = document.getElementById("idEmpresa").innerHTML;
 
    xmlhttp.open("GET","../Controlador/getPlato.php?idEmpresa="+idEmpresa,true);
    xmlhttp.send();
}	

function consultarPedido(){

  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("respuesta_pedido").innerHTML=xmlhttp.responseText;
      }
    }

  var idPedido = $("#idPedido").val();
 
    xmlhttp.open("GET","../Controlador/getPedido.php?idPedido="+idPedido,true);
    xmlhttp.send();
}

function cancelarPedido(){
}

function confirmarPedido(){
	var xmlhttp = new XMLHttpRequest();
	var idPedido = $("#idPedido").val();
	location.href="factura.php?idPedido="+idPedido;
}