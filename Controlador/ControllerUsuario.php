<?php
	
	require_once ('ControladorUsuario.php');
	
	
	if($_POST['usuario'] && $_POST['contrasenia'] && $_POST['rol'] && $_POST['idEmpresa']){
		
 		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasenia'];
		$rol = $_POST['rol'];
		$idEmpresa = $_POST['idEmpresa'];
		
	  	$controlador = new ControladorUsuario();
	  	$controlador->insertarUsuario($usuario,$contrasena,$rol,$idEmpresa);		
	}  	
?>