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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">    
    
    <title>Admin</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/stylesAdminSistema.css" rel="stylesheet">  
    <script type="text/javascript" src="../js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../js/scriptsAdminSistema.js"></script>  
    <script type="text/javascript" src="../js/bootstrap.min.js"></script> 
   
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
			 	<a id="cerrar_sesion" href="CerrarSesion.php">Cerrar Sesión</a>	
			 </ul>			 
		</div>
    </div> <!--FIN Container-->

    <div class="container contenedor_contenido">

		<div class="row">
			<div class="col-md-6 usuario">
				<div class="wrapper">
					<h3>Registrar Usuario</h3>	

						<form class="form-signin" role="form" method="GET">
					        <input id="usuario"     type="text" class="form-control" placeholder="Usuario" autofocus>
					        <input id="contrasenia" type="password" class="form-control" placeholder="Contraseña">
					        
					        <select id="roles">                    
					          <option selected>cajero</option>         
					          <option>adminEmpresa</option>                   
					          <option>admin</option>         
					        </select>

					        <select id="empresas">
						  	</select>

					        <a class="btn enviar registrar_usuario">Registrar</a>
					        <div id="respuesta_usuario"></div>
				    	</form>
				</div>
			</div><!--Usuario-->

			<div class="col-md-6 empresa">
				<div class="wrapper">
					<h3>Registrar Empresa</h3>

					<form class="form-signin" role="form" method="GET">
				        <input id="titulo"    class="form-control" type="text" placeholder="Título">
				        <input id="logo"      class="form-control" type="text" placeholder="Logo">
				        <input id="url"       class="form-control" type="text" placeholder="Url">
				        <input id="direccion" class="form-control" type="text" placeholder="Dirección">
				        <input id="telefono"  class="form-control" type="text" placeholder="Teléfono"> 
				        <a class="btn enviar registrar_empresa">Registrar</a>
				        <div id="respuesta_empresa"></div>
				    </form>
				</div>
			</div><!--Empresa-->
		</div>
    </div> <!--FIN Container-->

	<script>
  		$( ".registrar_empresa" ).click(function() {
    		registrarEmpresa();
  		});

  		$( ".registrar_usuario" ).click(function() {
    		registrarUsuario();
  		});
  	</script>

  </body>
</html>