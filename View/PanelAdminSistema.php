<?php	
   session_start();

	if(@$_SESSION['acceso'] == 1 && @$_SESSION['rol'] == 'admin'){
				
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
    
    <title>Admin</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/stylesAdminSistema.css" rel="stylesheet">  
    <script type="text/javascript" src="../js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../js/scriptsAdminSistema.js"></script>  
   
  </head>

  <body> 	

    <div class="container contenedor_menu">
		
		<div class="menu">
			 <h1>Bienvenido <?php echo $_SESSION['usuario']?>!</h1>
			 <div class="funciones">
				<a class="a_usuario" href="#" data-toggle="tooltip" data-placement="bottom" title="Usuarios">
					<img src="../img/user.png"/>
				</a>
				<a class="a_empresa" href="#" data-toggle="tooltip" data-placement="bottom" title="Empresas"> 
					<img src="../img/company.png"/>
				</a>
			 </div>
			 <ul class="pull-right">
			 	<a href="CerrarSesion.php">Cerrar Sesión</a>	
			 </ul>			 
		</div>
    </div> <!--FIN Container-->

    <div class="container contenedor_contenido">
		<div class="row">
			<div class="col-md-6 usuario prueba">
				<div class="wrapper">
					<h3>Registrar Usuario</h3>	

						<form class="form-signin" role="form" method="POST">
					        <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario" required autofocus>
					        <input id="contrasenia" name="contrasena" type="text" class="form-control" placeholder="Contrasena" required>
					        
					        <select id="roles">                    
					          <option selected>cajero</option>         
					          <option>adminEmpresa</option>                   
					          <option>admin</option>         
					        </select>

					        <select id="empresas">
							      <?php require '../Controlador/getEmpresa.php';?>
						  	</select>
					        
					        <button class="btn enviar registrar_usuario" type="submit">registrar</button>
				    	</form>
				</div>
			</div><!--Usuario-->

			<div class="col-md-6 empresa">
				<div class="wrapper">
					<h3>Registrar Empresa</h3>

						<form class="form-signin" role="form" method="POST">				      
					        <input id="titulo" name="titulo" type="text" class="form-control" placeholder="Titulo" required>
					        <input id="logo" name="logo" type="text" class="form-control" placeholder="Logo" required>
					        <input id="url" name="url" type="text" class="form-control" placeholder="Url" required>
					        <input id="direccion" name="direccion" type="text" class="form-control" placeholder="direccion" required> 
					        <input id="telefono" name="telefono" type="text" class="form-control" placeholder="Telefono" required> 
					        <button class="btn enviar registrar_empresa" type="submit">registrar</button>
				    	</form>
				</div>
			</div><!--Empresa-->
		</div>
    </div> <!--FIN Container-->

  </body>
</html>