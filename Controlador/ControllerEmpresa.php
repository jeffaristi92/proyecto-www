<?php

	require 'ControladorEmpresa.php';
		
	//el Título es lo único que no puede ir vacio, por eso la validación.
	if($_GET['titulo']){

		@$titulo = $_GET['titulo'];
		@$logo = $_GET['logo'];
		@$url = $_GET['url'];
		@$direccion = $_GET['direccion'];
		@$telefono = $_GET['telefono'];

		$controlador = new ControladorEmpresa();
	  	$controlador->insertarEmpresa($titulo, $logo, $url, $direccion, $telefono);
 	}
?>