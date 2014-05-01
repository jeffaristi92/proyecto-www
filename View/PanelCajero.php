<?php	
   session_start();

	if(@$_SESSION['acceso'] == 1 && @$_SESSION['rol'] == 'cajero'){
		
	}else{
		echo "<script type='text/javascript' language='javascript'>
				location.href='../index.php';
			</script>";	
	}	
?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    
    
    <title>Cajero</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/stylesCajero.css" rel="stylesheet">    
   
  </head>

  <body> 	

    <div class="container">

        <h1>Bienvenido <?php echo $_SESSION['usuario']?>! </h1>
    	<a href="CerrarSesion.php">Cerrar Sesión</a>
    </div> <!--FIN Container-->
  </body>
</html>