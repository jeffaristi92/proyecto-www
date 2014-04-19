<?php
	
	require_once '../controlador/ControladorUsuario.php';
	
	
	if($_POST['usuario'] && $_POST['contrasenia'] && $_POST['rol'] && $_POST['idEmpresa']){
		echo "we are in!";
 		$usuario = $_POST['usuario'];
		$contrasena = $_POST['contrasenia'];
		$rol = $_POST['rol'];
		$idEmpresa = $_POST['idEmpresa'];
		
	  	$controlador = new ControladorUsuario();
	  	$controlador->insertarUsuario($usuario,$contrasena,$rol,$idEmpresa);		
	}  	
?>