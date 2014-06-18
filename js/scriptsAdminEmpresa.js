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
        document.getElementById("respuesta_adicional").innerHTML=xmlhttp.responseText;
      }
    }

  var nombre = $("#nombre_a").val();
	var ingredientes = $("#ingredientes_a").val();
	var precio = $("#precio_a").val();
  var idEmpresa = document.getElementById("idEmpresa").innerHTML;

    xmlhttp.open("GET","../Controlador/ControllerAdicional.php?nombre="+nombre+"&ingredientes="+ingredientes+"&precio="+precio+"&idEmpresa="+idEmpresa,true);
    xmlhttp.send();
}

function registrarPlato() {
 
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("respuesta_plato").innerHTML=xmlhttp.responseText;

        //luego de registrar un plato lo listamos ya sea en la lista que corresponda(activos o inactivos)
        listarPlatosActivos();
        listarPlatosInactivos();
      }
    }

  var nombre = $("#nombre").val();
	var ingredientes = $("#ingredientes").val();
	var fecha = $("#fecha").val();
	var imagen = $("#imagen").val();
	var precio = $("#precio").val();
	var activo = $("#activo").val();
	var idEmpresa = document.getElementById("idEmpresa").innerHTML;

    xmlhttp.open("GET","../Controlador/ControllerPlato.php?nombre="+nombre+"&ingredientes="+ingredientes+
    			"&fecha="+fecha+"&imagen="+imagen+"&precio="+precio+"&activo="+activo+"&idEmpresa="+idEmpresa,true);
    xmlhttp.send();
}

function listarPlatosActivos() {
 
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("platos_activos").innerHTML=xmlhttp.responseText;       
      }
    }

    var valor = 'activos';
    var idEmpresa = document.getElementById("idEmpresa").innerHTML;
    xmlhttp.open("GET","../Controlador/getPlatos.php?accion="+valor+"&idEmp="+idEmpresa,true);
    xmlhttp.send();
}

function listarPlatosInactivos(){

  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("platos_inactivos").innerHTML=xmlhttp.responseText;       
      }
    }

    var valor = 'inactivos';
    var idEmpresa = document.getElementById("idEmpresa").innerHTML;
    xmlhttp.open("GET","../Controlador/getPlatos.php?accion="+valor+"&idEmp="+idEmpresa,true);
    xmlhttp.send();
}

function inactivarPlato(){
  
  var id = $( ".activos" ).val();

   var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {          
          listarPlatosActivos();
          listarPlatosInactivos();
      }
    }

    var valor = 'desactivar';
    xmlhttp.open("GET","../Controlador/getPlatos.php?accion="+valor+"&id="+id,true);
    xmlhttp.send();
}

function activarPlato(){
  
  var id = $( ".inactivos" ).val();

   var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {          
          listarPlatosActivos();
          listarPlatosInactivos();
      }
    }

    var valor = 'activar';
    xmlhttp.open("GET","../Controlador/getPlatos.php?accion="+valor+"&id="+id,true);
    xmlhttp.send();
}