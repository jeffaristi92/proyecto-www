<?php	
   session_start();

  	if(@$_SESSION['acceso'] == 1 && @$_SESSION['rol'] == 'adminEmpresa'){
  		
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

              <form class="form-signin" role="form" method="GET">
                <input id="nombre"       type="text"   class="form-control" placeholder="Nombre" autofocus>
                <input id="ingredientes" type="text"   class="form-control" placeholder="Ingredientes">
                <input id="fecha"        type="date"   class="form-control">
                <input id="imagen"       type="text"   class="form-control" placeholder="Imagen">
                <input id="precio"       type="number" class="form-control" placeholder="Precio">

                <select id="activo" class="form-control">
                    <option value="si">Activo</option>
                    <option value="no">No Activo</option>
                </select>
                <div id="idEmpresa" style="display: none;"><?php echo $_SESSION['empresa'] ?></div>   
                <a class="btn enviar registrar_plato">Registrar</a>
                <div id="respuesta_plato"></div>
              </form>
          </div>
        </div><!--plato-->

        <div class="col-md-6 adicional">
          <div class="wrapper">
            <h3>Registrar Adicional</h3>

              <form class="form-signin"  role="form" method="GET">
                <input id="nombre_a"       type="text"   class="form-control" placeholder="Nombre">
                <input id="ingredientes_a" type="text"   class="form-control" placeholder="Ingredientes">
                <input id="precio_a"       type="number" class="form-control" placeholder="Precio">
                <a class="btn enviar registrar_adicional">Registrar</a>
                <div id="respuesta_adicional"></div>
              </form>
          </div>
        </div><!--adicional-->
      </div><!--FIN row-->
    </div> <!--FIN Container-->

    <script>
      $( ".registrar_adicional" ).click(function() {
        registrarAdicional();
      });
      $( ".registrar_plato" ).click(function() {
        registrarPlato();
      });
    </script>

  </body>
</html>