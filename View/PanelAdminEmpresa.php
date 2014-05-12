<?php	
   session_start();

  	if(@$_SESSION['acceso'] == 1 && $_SESSION['rol'] == 'adminEmpresa'){
  		
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
    
    <title>Admin Empresa</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/stylesAdminSistema.css" rel="stylesheet">  
    <link href="../css/stylesAdminEmpresa.css" rel="stylesheet">  
    <script type="text/javascript" src="../js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../js/scriptsAdminEmpresa.js"></script>  
   
  </head>

  <body>  

    <div class="container contenedor_menu">
    
    <div class="menu">
       <h1>Bienvenido <?php echo $_SESSION['usuario']?>!</h1>
       <div class="funciones">
        <a class="a_plato" href="#" data-toggle="tooltip" data-placement="bottom" title="Plato">
          <img src="../img/plato.png"/>
        </a>
        <a class="a_adicional" href="#" data-toggle="tooltip" data-placement="bottom" title="Adicional"> 
          <img src="../img/adicional.png"/>
        </a>
       </div>
       <ul class="pull-right">
        <a href="CerrarSesion.php">Cerrar Sesión</a>  
       </ul>       
    </div>
    </div> <!--FIN Container-->

    <div class="container contenedor_contenido">
      <div class="row">
        <div class="col-md-6 plato">
          <div class="wrapper">
            <h3>Registrar Plato</h3>  

              <form class="form-signin" role="form" action="../Controlador/ControllerPlato.php" method="POST">
                <input name="nombre" type="text" class="form-control" placeholder="Nombre" required autofocus>
                <input name="ingredientes" type="text" class="form-control" placeholder="Ingredientes" required>
                <input name="fecha" type="date" class="form-control" required>
                <input name="imagen" type="text" class="form-control" placeholder="Imagen" required>
                <input name="precio" type="number" class="form-control" placeholder="Precio" required>

                <select name="activo" class="form-control" required>
                    <option value="si">Activo</option>
                    <option value="no">No Activo</option>
                </select>

                <input name="idEmpresa" type="number" class="form-control" placeholder="Id de Empresa" required>
                <button class="btn enviar" type="submit">Registrar</button>
              </form>

          </div>
        </div><!--plato-->

        <div class="col-md-6 adicional">
          <div class="wrapper">
            <h3>Registrar Adicional</h3>

              <form class="form-signin" role="form" method="POST">
                <input id="nombre" type="text" class="form-control" placeholder="Nombre" required>
                <input id="ingredientes" type="text" class="form-control" placeholder="Ingredientes">
                <input id="precio" type="number" class="form-control" placeholder="Precio" required>
                <button class="btn enviar registrar_adicional">Registrar</button>
               </form>
          </div>
        </div><!--adicional-->
      </div>
    </div> <!--FIN Container-->

  </body>
</html>