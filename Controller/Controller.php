<?php

require 'ControladorLogin.php';

  @$usuario = $_POST['usuario'];
  @$contrasenia = $_POST['password'];

  $controlador = new ControladorLogin($usuario, $contrasenia);  

?>