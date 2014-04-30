<?php
  session_start();

  if(@$_SESSION['acceso'] == 1){

    echo "<script type='text/javascript' language='javascript'>
          location.href='View/Welcome.php';
      </script>"; 
  }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    
    
    <title>Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">    
    <link href="css/signin.css" rel="stylesheet">    
    <link href="css/styles.css" rel="stylesheet">    
   
  </head>

  <body> 	

    <div class="container">

      <div class="header">
        <h1>Bienvenido!</h1>
        <p>Esta es la nueva forma de gestionar todas las operaciones de su empresa.</p>
      </div>
          <div class="background_login">      
            <form class="form-signin" role="form" action="Controlador/ControllerLogin.php" method="POST">
              <label>Usuario:</label>
              <input name="usuario" type="text" class="form-control" required="" autofocus="">
              <label>Contraseña:</label>
              <input name="password" type="password" class="form-control" required="">        
              <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
            </form>
          </div>
      

    </div> <!--FIN Container-->
  </body>
</html>