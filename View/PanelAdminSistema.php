<?php	
   session_start();

	if(@$_SESSION['acceso'] == 1 && $_SESSION['rol'] == 'admin'){
		echo "Bienvenido ".$_SESSION['usuario'].". Usted ha ingresado al Sistema!";
	    echo "<a href=\"CerrarSesion.php\">Cerrar Sesion</a></br>";
		
		
	}else{
		echo "<script type='text/javascript' language='javascript'>
				alert('Para acceder a esta página es necesario que haya iniciado sesión');
			 	location.href='../index.php';
			</script>";	
	}
	
?>