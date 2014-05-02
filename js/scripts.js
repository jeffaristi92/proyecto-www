$(document).ready(function(){

	    $(".enviar").click(

	    	function(){
	    		enviarFormulario();
	    	}
	    );

	    $(".iniciar").click(

	    	function(){
	    		login();
	    	}
	    );

	    /*Funciones para PanelAdminSistema animación anclas <a>*/
	    $('.a_empresa').click(function(){
										   
			$('html, body').animate({ scrollTop: $(".empresa").offset().top }, 900);			   
		});

		$('.a_usuario').click(function(){
										   
			$('html, body').animate({ scrollTop: "0px" }, 900);			   
		});
	     /*Funciones para PanelAdminSistema animación anclas <a>*/
});

function enviarFormulario(){
	
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

function login(){

	var user = $(".usuario").val();
	var pass = $(".password").val();				

		console.log("Usuario: " + user);
		console.log("password: " + pass);

		$.ajax({
			type: "POST",
			url: "Controlador/ControllerLogin.php",
			data: { usuario: user,
					password: pass},
			cache: false,
			success: function(resultado){
				$(".respuesta").html(resultado);				
			}
		});		
}
