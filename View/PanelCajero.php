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

<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    

    <title>Cajero</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/stylesAdminSistema.css" rel="stylesheet">  
    <link href="../css/stylesCajero.css" rel="stylesheet">  
    <script type="text/javascript" src="../js/jquery-2.1.0.min.js"></script>    
    <script type="text/javascript" src="../js/scriptsPedido.js"></script>
  </head>

  <body> 	

    <div class="container contenedor_menu">    
      <div class="menu">
         <h1>Bienvenido <?php echo $_SESSION['usuario']?>!</h1>
         <ul class="pull-right">
          <a id="cerrar_sesion" href="CerrarSesion.php">Cerrar Sesión</a>  
         </ul>       
      </div>
    </div> <!--FIN Container-->

	<script> var total=0; </script>
    
    <div class="container contenedor_contenido">
      <div class="row">
        <div class="col-md-6 plato">
          <div class="wrapper">
            <h3>Registrar Pedido</h3>  

               <form class="form-signin" role="form" action="../Controlador/ControllerPedido.php" method="GET">
                    
                    <input name="fecha" type="date" class="form-control" required autofocus>
                    <select name="estado" class="form-control" required autofocus>
                        <option value="En Proceso">En Proceso</option>
                        <option value="Realizado">Realizado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                    <select name="tipoPago" class="form-control" required autofocus>
                        <option value="Credito">Credito</option>
                        <option value="Debito">Debito</option>
                        <option value="Efectivo">Efectivo</option>
                    </select>
                                        
                    <select id="platos">
                          <?php require '../Controlador/getPlato.php';?>
                    </select>
                    <input name="cantidadPlato" type="text" id="cantidadPlato"/>
                    <input id="boton" type="button" value="Agregar plato" onClick="agregarPlato()"/>
                    <select id="listaPlatos" name="listaPlatos[]" multiple="multiple">
                    </select>
                    
                    <select id="adicionales">
                          <?php require '../Controlador/getAdicional.php';?>
                    </select>
                    <input name="cantidadAdicional" type="text" id="cantidadAdicional"/>
                    <input id="boton" type="button" value="Agregar Adicional" onClick="agregarAdicional()"/>
                    <select id="listaAdicionales" name="listaAdicionales[]" multiple="multiple">
                    </select>                    

                    <a class="btn enviar registrar_pedido">Registrar</a>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
                </form>
                <table id="precioTotal"></table>
          </div>
        </div><!--plato-->
      </div><!--FIN row-->
    </div><!--FIN Container-->

  </body>
</html>