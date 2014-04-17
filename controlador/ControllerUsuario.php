<?php
	
require 'ControladorUsuario.php';
	
	@$usuario = $_POST['usuario'];
	@$contrasena = $_POST['contrasena'];
	@$rol = $_POST['rol'];
	@$idEmpresa = $_POST['idEmpresa'];
	
  	$controlador = new ControladorUsuario();
  	$controlador->insertarUsuario($usuario,$contrasena,$rol,$idEmpresa);
?>