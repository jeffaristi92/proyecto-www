$(document).ready(function(){

	      /*Funciones para PanelAdminSistema animación anclas <a>*/
	    $('.a_empresa').click(function(){
										   
			$('html, body').animate({ scrollTop: $(".empresa").offset().top }, 900);			   
		});

		$('.a_usuario').click(function(){
										   
			$('html, body').animate({ scrollTop: "0px" }, 900);			   
		});
	     /*Fin*/

});

function registrarEmpresa() {

	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function() {
  		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
    		document.getElementById("respuesta").innerHTML=xmlhttp.responseText;
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
