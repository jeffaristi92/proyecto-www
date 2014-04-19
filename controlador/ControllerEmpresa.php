<?php
	
require 'ControladorEmpresa.php';
	
	@$titulo = $_POST['titulo'];
	@$logo = $_POST['logo'];
	@$url = $_POST['url'];
	@$direccion = $_POST['direccion'];
	@$telefono = $_POST['telefono'];
	
  	$controlador = new ControladorEmpresa();
  	$controlador->insertarEmpresa($titulo,$logo,$url,$direccion,$telefono);
?>