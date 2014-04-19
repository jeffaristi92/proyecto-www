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
   
  </head>

  <body> 	

    <div class="container">

      <form class="form-signin" role="form" action="Controller/Controller.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="usuario" type="text" class="form-control" placeholder="User" required="" autofocus="">
        <input name="password" type="password" class="form-control" placeholder="Password" required="">        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> 
  </body>
</html>