<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    

    <title>Registro empresas</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">    
    <link href="../css/signin.css" rel="stylesheet">
   
  </head>

  <body> 	

    <div class="container">

      <form class="form-signin" role="form" action="../Controlador/ControllerEmpresa.php" method="POST">
        <h2 class="form-signin-heading">Registro empresa</h2>
        <input name="titulo" type="text" class="form-control" placeholder="Titulo" required autofocus>
        <input name="logo" type="text" class="form-control" placeholder="Logo" required autofocus>
        <input name="url" type="text" class="form-control" placeholder="Url" required autofocus>
        <input name="direccion" type="text" class="form-control" placeholder="direccion" required autofocus>
        <input name="telefono" type="text" class="form-control" placeholder="Telefono" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">registrar</button>
      </form>

    </div> 
  </body>
</html>