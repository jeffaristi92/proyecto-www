$(document).ready(function(){

	    $(".registrar_adicional").click(

	    	function(){
	    		registrarAdicional();
	    	}
	    );	   


	      /*Funciones para PanelAdminEmpresa animación anclas <a>*/
	    $('.a_adicional').click(function(){
										   
			$('html, body').animate({ scrollTop: $(".adicional").offset().top }, 900);			   
		});

		$('.a_plato').click(function(){
										   
			$('html, body').animate({ scrollTop: "0px" }, 900);			   
		});
	     /*Fin*/

});

function registrarAdicional(){
	
	var var_nombre = $("#nombre").val();
	var var_ingredientes = $("#ingredientes").val();
	var var_precio = $("#precio").val();

		$.ajax({
			type: "POST",
			url: "../Controlador/ControllerAdicional.php",
			data: { nombre: var_nombre, ingredientes: var_ingredientes, precio: var_precio},
			cache: false,
			success: function(){				
				//mostrar mensaje
			} 			
		});
}
