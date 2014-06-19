function agregarPlato(){

	boton = document.getElementById('botonregistrarpedi');
	boton.removeAttribute("disabled");
	indice = document.getElementById("platos").selectedIndex;
	valor = document.getElementById("platos").options[indice].firstChild.nodeValue;
	var cantidad = document.getElementById("cantidadPlato").value
	
	var valoresPlato = document.getElementById("platos").value.split("-");
	var plato = valoresPlato[0];
	var precio = valoresPlato[1];
	
	total = total + (cantidad*precio);
	
	var precioTotal = document.getElementById("precioTotal");
	precioTotal.innerHTML = "<h3>"+total+"</h3>";
	
	var opcion = document.createElement("option");
	opcion.setAttribute("value",plato+"-"+cantidad);
	opcion.setAttribute("selected",true);
	
	var contenido = document.createTextNode(cantidad+" - "+valor);
	opcion.appendChild(contenido);
	
	var lista = document.getElementById("listaPlatos");
	lista.appendChild(opcion);
	
}

function agregarAdicional(){

	boton = document.getElementById('botonregistrarpedi');
	boton.removeAttribute("disabled");
	indice = document.getElementById("adicionales").selectedIndex;
	valor = document.getElementById("adicionales").options[indice].firstChild.nodeValue;
	var cantidad = document.getElementById("cantidadAdicional").value
	
	var valoresPlato = document.getElementById("adicionales").value.split("-");
	var plato = valoresPlato[0];
	var precio = valoresPlato[1];
	
	total = total + (cantidad*precio);
	
	var precioTotal = document.getElementById("precioTotal");
	precioTotal.innerHTML = "<h3>"+total+"</h3>";;
	
	var opcion = document.createElement("option");
	opcion.setAttribute("value",plato+"-"+cantidad);
	opcion.setAttribute("selected",true);
	
	var contenido = document.createTextNode(cantidad+" - "+valor);
	opcion.appendChild(contenido);
	
	var lista = document.getElementById("listaAdicionales");
	lista.appendChild(opcion);
}

function removerPlato(){
	var x = document.getElementById("listaPlatos");
	var cantidad = x.value.split("-")[1];
	var precio = x.options[x.selectedIndex].firstChild.nodeValue.split("$")[1];
	total = total - (cantidad*precio);
	var precioTotal = document.getElementById("precioTotal");
	precioTotal.innerHTML = "<h3>"+total+"</h3>";
	
	x.remove(x.selectedIndex);
}

function removerAdicional(){
	var x = document.getElementById("listaAdicionales");
	var cantidad = x.value.split("-")[1];
	var precio = x.options[x.selectedIndex].firstChild.nodeValue.split("$")[1];
	total = total - (cantidad*precio);
	var precioTotal = document.getElementById("precioTotal");
	precioTotal.innerHTML = "<h3>"+total+"</h3>";
	
	x.remove(x.selectedIndex);
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

function consultarAdicionales(){

	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("adicionales").innerHTML=xmlhttp.responseText;
      }
    }

    var idEmpresa = document.getElementById("idEmpresa").innerHTML;
 
    xmlhttp.open("GET","../Controlador/getAdicional.php?idEmpresa="+idEmpresa,true);
    xmlhttp.send();
}	

function consultarPedido(){

  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("respuesta_consulta_pedido").innerHTML=xmlhttp.responseText;
      }
    }
	
  	var idPedido = $("#idPedido").val();
 	var idEmpresa = document.getElementById("idEmpresa").innerHTML;
	
    xmlhttp.open("GET","../Controlador/getPedido.php?idPedido="+idPedido+"&idEmpresa="+idEmpresa,true);
    xmlhttp.send();
}

function cancelarPedido(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("respuesta_consulta_pedido").innerHTML=xmlhttp.responseText;
      }
    }

  var idPedido = $("#idPedido").val();
 
    xmlhttp.open("GET","../Controlador/cancelarPedido.php?idPedido="+idPedido,true);
    xmlhttp.send();
}

function confirmarPedido(){
	
	var xmlhttp = new XMLHttpRequest();
	var idPedido = $("#idPedido").val();
	window.open("factura.php?idPedido="+idPedido);
}

function validarboton(val,btx) {

		boton = document.getElementById(btx);
		if(val>0 || val==null || val==""){			
			if (val==null || val=="") {boton.disabled=true} 
			else {boton.disabled=false} 
		} else {alert('Alguno de los valores ingresados es no numérico, un número no válido');
			boton.disabled=true;
		}
}