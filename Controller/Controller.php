<?php

require 'ControladorLogin.php';

  @$correo = $_POST['email'];
  @$contrasenia = $_POST['password'];

  $controlador = new ControladorLogin($correo, $contrasenia);  

?>