<!DOCTYPE html>

<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    

    <title>Cajero</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/stylesAdminSistema.css" rel="stylesheet">  
    <link href="../css/stylesCajero.css" rel="stylesheet">  
    <script type="text/javascript" src="../js/jquery-2.1.0.min.js"></script>    
    <script type="text/javascript" src="../js/scriptsCajero.js"></script>
  </head>
  <body> 	
    <div class="container contenedor_menu">    
      <div class="menu">
         <h1>Bienvenido <?php echo $_SESSION['usuario']?>!</h1>
         <div class="funciones">
				<a class="a_usuario" href="PanelCajero.php?opcion=registrar" data-toggle="tooltip" data-placement="bottom" title="Usuarios">
					<img src="../img/user.png"/>
				</a>
				<a class="a_empresa" href="PanelCajero.php?opcion=consultar" data-toggle="tooltip" data-placement="bottom" title="Empresas"> 
					<img src="../img/company.png"/>
				</a>
			 </div>
         <ul class="pull-right">
          <a id="cerrar_sesion" href="CerrarSesion.php">Cerrar Sesión</a>  
         </ul>       
      </div>
    </div> <!--FIN Container-->
  </body>
</html>