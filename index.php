<?php
  session_start();

    if(@$_SESSION['acceso'] == 1 && @$_SESSION['rol'] == 'admin'){

      echo "<script type='text/javascript' language='javascript'>
            location.href='View/PanelAdminSistema.php';          
          </script>"; 

    }elseif(@$_SESSION['acceso'] == 1 && @$_SESSION['rol'] == 'adminEmpresa'){

      echo "<script type='text/javascript' language='javascript'>
            location.href='View/PanelAdminEmpresa.php';          
          </script>"; 

    }elseif(@$_SESSION['acceso'] == 1 && @$_SESSION['rol'] == 'cajero'){

      echo "<script type='text/javascript' language='javascript'>
            location.href='View/PanelCajero.php';          
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
    <script src="js/jquery-2.1.0.min.js" type="text/javascript"></script>   
    <script src="js/scripts.js" type="text/javascript"></script>      
  </head>

  <body> 	

    <div class="container">

        <h1>Bienvenido!</h1>
        <p>Esta es la nueva forma de gestionar todas las operaciones de su empresa.</p>
      
          <div class="background_login">      
            <form class="form-signin" role="form" method="POST">
              <label>Usuario:</label>
              <input id="usuario" name="usuario" type="text" class="form-control" required="" autofocus="">
              <label>Contraseña:</label>
              <input id="password" type="password" class="form-control" required="">        
              <button class="btn btn-lg btn-primary btn-block iniciar">Iniciar Sesión</button>
            </form>
          </div>    

    </div> <!--FIN Container-->

  <script>
  $( ".iniciar" ).click(function() {
    login()
  });
  </script>

  </body>
</html>