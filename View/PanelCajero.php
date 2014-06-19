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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
				<!--<a class="a_usuario" href="PanelCajero.php?opcion=registrar" data-toggle="tooltip" data-placement="bottom" title="Usuarios">
					<img src="../img/adicional.png"/>
				</a>
				<a class="a_empresa" href="PanelCajero.php?opcion=consultar" data-toggle="tooltip" data-placement="bottom" title="Empresas"> 
					<img src="../img/company.png"/>
				</a>-->
			 </div>
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

               <div id="idEmpresa" style="display: none;"><?php echo $_SESSION['empresa'] ?></div>   
               <form class="form-signin" role="form" action="../Controlador/ControllerPedido.php" method="GET">
                    
                    <input id="fecha" type="date" class="form-control" autofocus>
                    <select id="tipoPago" class="form-control" autofocus>
                        <option value="Credito">Credito</option>
                        <option value="Debito">Debito</option>
                        <option value="Efectivo">Efectivo</option>
                    </select>
                                        
                    <select id="platos">
                          <script>
                            consultarPlatos();
                          </script>
                    </select>
                    <input name="cantidadPlato" type="text" id="cantidadPlato" onkeyup="validarboton(this.value,'botonP')"/>
                    <input id="botonP" type="button" value="Agregar plato" onClick="agregarPlato()" disabled/>
                    <select id="listaPlatos" name="listaPlatos[]" multiple="multiple">
                    </select>
                    
                    <select id="adicionales">
                          <script>
                            consultarAdicionales();
                          </script>
                    </select>
                    <input name="cantidadAdicional" type="text" id="cantidadAdicional" onkeyup="validarboton(this.value,'botonA')"/>
                    <input id="botonA" type="button" value="Agregar Adicional" onClick="agregarAdicional()" disabled/>
                    <select id="listaAdicionales" name="listaAdicionales[]" multiple="multiple">
                    </select>                    

                    <a id = "botonregistrarpedi" class="btn enviar registrar_pedido" disabled>Registrar</a>
                    <div id="respuesta_pedido"></div>
                </form>
                <table>
                	<tr>
                    <td>
                    <h3>Total:</h3>
                    </td>
                    <td  id="precioTotal">
                    </td>
                    </tr>
                </table>
          </div>
        </div><!--plato-->
        
        <div class="col-md-6 plato">
          		<div class="wrapper">
            		<h3>Consultar Pedido</h3>
                    <form class="form-signin" role="form" action="PanelCajero.php?opcion=consultar" method="get">
                        <input name="idPedido" id="idPedido" type="text" class="form-control" placeholder="Nro Pedido" autofocus>
                        <a class="btn enviar confirmar_pedido">Confirmar</a>
                        <a class="btn enviar consultar_pedido">Consultar</a>
                        <a class="btn enviar cancelar_pedido">Cancelar</a>                        
                    </form>
                    <div id="respuesta_consulta_pedido"></div>
          		</div>
        	</div>
      </div><!--FIN row-->
    </div><!--FIN Container-->
    
     <script>
      $( ".registrar_pedido" ).click(function() {
        registrarPedido();
      });
	  $( ".consultar_pedido" ).click(function() {
        consultarPedido();
      });
	  $( ".cancelar_pedido" ).click(function() {
        cancelarPedido();
      });
	  $( ".confirmar_pedido" ).click(function() {
        confirmarPedido();
      });
    </script>

  </body>
</html>