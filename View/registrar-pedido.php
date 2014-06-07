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
   
  </head>

  <body> 	

    <div class="container">
        <form class="form-signin" role="form" action="../controlador/ControllerPedido.php" method="POST">
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
        <select id="platos">
              <?php require '../Controlador/getPlato.php';?>
        </select>
        <select id="adicionales">
              <?php require '../Controlador/getAdicional.php';?>
        </select>
        <div class="col-md-6">                     
            <h5><b>Activos</b></h5>                         
            <select class="activos" id="platos_activos" multiple="multiple">
                
                  <option value='opcion1' >opcion1</option>
                  <option value='opcion2' >opcion2</option>
                  <option value='opcion3' >opcion3</option>
                
            </select>
        </div>



        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
      </form>

    </div> 
  </body>
</html>
