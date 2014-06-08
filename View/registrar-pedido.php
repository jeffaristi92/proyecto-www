<!DOCTYPE html>

<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Registro Pedido</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
    <script type="text/javascript" src="../js/scriptsPedido.js"></script>
  </head>

  <body> 	
	<script> var total=0; </script>
    <div class="container">
        <form class="form-signin" role="form" action="../controlador/ControllerPedido.php" method="GET">
        <table>
        <h2 class="form-signin-heading">Registro Pedido</h2>        
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
        <input name="idCajero" type="string" class="form-control" placeholder="idCajero" required autofocus>
        </table>
        <table>
        <select id="platos">
              <?php require '../Controlador/getPlato.php';?>
        </select>
        <input name="cantidadPlato" type="text" id="cantidadPlato" tabindex="14"/>
        <input type="button" value="Agregar plato" onClick="agregarPlato()"  tabindex="15"/>
        <select id="listaPlatos" name="listaPlatos[]" multiple="multiple">
        </select>
        </table>
        <table>
        <select id="adicionales">
              <?php require '../Controlador/getAdicional.php';?>
        </select>
        <input name="cantidadAdicional" type="text" id="cantidadAdicional" tabindex="14"/>
        <input type="button" value="Agregar Adicional" onClick="agregarAdicional()"  tabindex="15"/>
        <select id="listaAdicionales" name="listaAdicionales[]" multiple="multiple">
        </select>
        </table>
		
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
      </form>
      <table id="precioTotal"></table>
		
    </div> 
  </body>
</html>
