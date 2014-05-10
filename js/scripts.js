
function login(){

	var user = $("#usuario").val();
	var pass = $("#password").val();				

		$.ajax({
			type: "POST",
			url: "Controlador/ControllerLogin.php",
			data: { usuario: user,
					password: pass},
			cache: false,
			success: function(resultado){
				
			}
		});		
}
