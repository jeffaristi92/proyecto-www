<?php
	
require 'ControladorEmpresa.php';
	
	//el Título es lo único que no puede ir vacio, por eso la validación.
	if($_POST['titulo']){

		@$titulo = $_POST['titulo'];
		@$logo = $_POST['logo'];
		@$url = $_POST['url'];
		@$direccion = $_POST['direccion'];
		@$telefono = $_POST['telefono'];
		
	  	$controlador = new ControladorEmpresa();
	  	$controlador->insertarEmpresa($titulo, $logo, $url, $direccion, $telefono);
  }
?>