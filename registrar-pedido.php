<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Registro Pedido</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">    
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/scriptsPedido.js" type="text/javascript"></script> 
   
  </head>

  <body> 	

    <div class="container">

      <form class="form-signin" role="form" action="controlador/ControllerPedido.php" method="GET">
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
        <select name="plato" id="plato" class="form-control" required autofocus>
        	<option value="1">1</option>
  			<option value="2">2</option>
  			<option value="3">3</option>
        </select>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
      </form>
      
      <ul id="listaPlatos">
      </ul>

    </div> 
  </body>
</html>