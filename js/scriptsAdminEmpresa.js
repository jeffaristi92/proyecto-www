$(document).ready(function(){

        /*Funciones para PanelAdminEmpresa animación anclas <a>*/
	    $('.a_adicional').click(function(){
										   
			$('html, body').animate({ scrollTop: $(".adicional").offset().top }, 900);			   
		});

		$('.a_plato').click(function(){
										   
			$('html, body').animate({ scrollTop: "0px" }, 900);			   
		});
	    /*Fin*/

});

function registrarAdicional() {
 
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("respuesta").innerHTML=xmlhttp.responseText;
      }
    }

  	var nombre = $("#nombre").val();
	var ingredientes = $("#ingredientes").val();
	var precio = $("#precio").val();

    xmlhttp.open("GET","../Controlador/ControllerAdicional.php?nombre="+nombre+"&ingredientes="+ingredientes+"&precio="+precio,true);
    xmlhttp.send();
}

function registrarPlato() {
 
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("respuesta").innerHTML=xmlhttp.responseText;
      }
    }

  	var nombre = $("#nombre").val();
	var ingredientes = $("#ingredientes").val();
	var fecha = $("#fecha").val();
	var imagen = $("#imagen").val();
	var precio = $("#precio").val();
	var activo = $("#activo").val();
	var idEmpresa = $("#idEmpresa").val();

    xmlhttp.open("GET","../Controlador/ControllerPlato.php?nombre="+nombre+"&ingredientes="+ingredientes+
    			"&fecha="+fecha+"&imagen="+imagen+"&precio="+precio+"&activo="+activo+"&idEmpresa="+idEmpresa,true);
    xmlhttp.send();
}
