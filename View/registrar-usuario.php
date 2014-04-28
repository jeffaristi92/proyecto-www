<!DOCTYPE html>

<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Registro Usuarios</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
   
  </head>

  <body> 	

    <div class="container">

      <form class="form-signin" role="form" method="POST">
        <h2 class="form-signin-heading">Registro usuario</h2>
        <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario" required autofocus>
        <input id="contrasenia" name="contrasena" type="text" class="form-control" placeholder="Contrasena" required autofocus>
        
        <select id="roles">                    
          <option selected>cajero</option>         
          <option>adminEmpresa</option>                   
          <option>admin</option>         
        </select>

        <select id="empresas">
		      <?php require '../Controlador/getEmpresa.php';?>
	  	  </select>
        
        <button class="btn enviar" type="submit">registrar</button>
      </form>

    </div> 
  </body>
</html>
