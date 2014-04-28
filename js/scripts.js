$(document).ready(function(){

	    $(".enviar").click(

	    	function(){
	    		enviarFormulario();
	    	}
	    );
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
