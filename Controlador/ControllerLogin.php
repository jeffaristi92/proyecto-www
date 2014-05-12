<?php

require_once ('ControladorLogin.php');

  @$usuario = $_GET['usuario'];
  @$contrasenia = $_GET['password'];

  $controlador = new ControladorLogin($usuario, $contrasenia);  
  $resultado = $controlador->verificarLogin();

  //enviando la respuesta a scripts.js para manejar redireccionamiento
  echo $resultado;  
?>