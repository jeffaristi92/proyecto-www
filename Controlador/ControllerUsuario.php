<?php
	
	require_once ('ControladorUsuario.php');
	
	
	if($_GET['usuario'] && $_GET['contrasenia'] && $_GET['rol'] && $_GET['idEmpresa']){
		
 		$usuario = $_GET['usuario'];
		$contrasena = $_GET['contrasenia'];
		$rol = $_GET['rol'];
		$idEmpresa = $_GET['idEmpresa'];
		
	  	$controlador = new ControladorUsuario();
	  	$controlador->insertarUsuario($usuario,$contrasena,$rol,$idEmpresa);		
	}  	
?>