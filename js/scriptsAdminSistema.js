$(document).ready(function(){

    cargarEmpresas();//lo primero que hace este archivo es cargar lista empresas

	  /*Funciones para PanelAdminSistema animación anclas <a>*/
	  $('.a_empresa').click(function(){
										   
		$('html, body').animate({ scrollTop: $(".empresa").offset().top }, 900);			   
		});

		$('.a_usuario').click(function(){
										   
		$('html, body').animate({ scrollTop: "0px" }, 900);			   
		});
	  /*Fin*/

});

function registrarUsuario() {
 
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("respuesta_usuario").innerHTML=xmlhttp.responseText;
      }
    }

    var usuario = $( "#usuario").val();
    var contrasenia = $( "#contrasenia").val();
    var rol = $( "#roles").val();
    var idEmpresa = $( "#empresas").val();

    xmlhttp.open("GET","../Controlador/ControllerUsuario.php?usuario="+usuario+"&contrasenia="+contrasenia+"&rol="+rol+"&idEmpresa="+idEmpresa,true);
    xmlhttp.send();
}

function registrarEmpresa() {
 
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function() {
  		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    		document.getElementById("respuesta_empresa").innerHTML=xmlhttp.responseText;
        //cada vez que se registre una nueva empresa volvemos a cargar la lista de empresas registradas
        cargarEmpresas();
    	}
  	}

  	var titulo = $( "#titulo").val();
  	var logo = $( "#logo").val();
  	var url = $( "#url").val();
  	var direccion = $( "#direccion").val();
  	var telefono = $( "#telefono").val();

  	xmlhttp.open("GET","../Controlador/ControllerEmpresa.php?titulo="+titulo+"&logo="+logo+"&url="+url+"&direccion="+direccion+"&telefono="+telefono,true);
  	xmlhttp.send();
}

function cargarEmpresas(){

  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        document.getElementById("empresas").innerHTML=xmlhttp.responseText;
      }
    }

    xmlhttp.open("GET","../Controlador/getEmpresa.php",true);
    xmlhttp.send();
}
