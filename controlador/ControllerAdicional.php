<?php
	
require 'ControladorAdicional.php';
	
	@$nombre = $_POST['nombre'];
	@$ingredientes = $_POST['ingredientes'];
	@$precio = $_POST['precio'];
	
  	$controlador = new ControladorAdicional();
  	$controlador->insertarAdicional($nombre,$ingredientes,$precio);
?>