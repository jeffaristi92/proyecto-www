
<?php
	session_start();

	if(@$_SESSION['acceso'] != 1){

		echo "<script type='text/javascript' language='javascript'>
				alert('Para acceder a esta página es necesario que haya iniciado sesión');
			 	location.href='../index.php';
			</script>";	
	}
?>


<!DOCTYPE html>

<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">    
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">    

	    <title>Bienvenido!</title>       
  </head>

<body>

	<h1><?php echo $_SESSION['rol'] ?> Usted ha ingresado al Sistema!</h1>
	<a href="CerrarSesion.php">Cerrar Sesión</a>

</body>
</html>