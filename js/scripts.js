$(document).ready(function(){

	    $(".iniciar").click(

	    	function(){
	    		login();
	    	}
	    );
});

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
				
			}
		});		
}
