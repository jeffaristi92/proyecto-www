$(document).ready(function(){

	    $(".registrar_usuario").click(

	    	function(){
	    		registrarUsuario();
	    	}
	    );	   

	     $(".registrar_empresa").click(

	    	function(){
	    		registrarEmpresa();
	    	}
	    );

	      /*Funciones para PanelAdminSistema animación anclas <a>*/
	    $('.a_empresa').click(function(){
										   
			$('html, body').animate({ scrollTop: $(".empresa").offset().top }, 900);			   
		});

		$('.a_usuario').click(function(){
										   
			$('html, body').animate({ scrollTop: "0px" }, 900);			   
		});
	     /*Fin*/

});

function registrarUsuario(){
	
	var nickName = $("#usuario").val();
	var password = $("#contrasenia").val();
	var roles = $("#roles").val();
	var idEmp = $("#empresas").val();

		$.ajax({
			type: "POST",
			url: "../Controlador/ControllerUsuario.php",
			data: { usuario: nickName, contrasenia: password, rol: roles, idEmpresa: idEmp},
			cache: false,
			success: function(){				
				alert('Usuario registrado exitosamente');
			} 			
		});
}

function registrarEmpresa(){
	
	var var_titulo = $("#titulo").val();
	var var_logo = $("#logo").val();
	var var_url = $("#url").val();
	var var_direccion = $("#direccion").val();
	var var_telefono = $("#telefono").val();

		$.ajax({
			type: "POST",
			url: "../Controlador/ControllerEmpresa.php",
			data: { titulo: var_titulo, logo: var_logo, url: var_url, direccion: var_direccion, telefono: var_telefono},
			cache: false,
			success: function(){				
				alert('Empresa registrado exitosamente');
			} 			
		});
}
