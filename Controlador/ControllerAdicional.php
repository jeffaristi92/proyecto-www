<?php
	
require 'ControladorAdicional.php';
	
	if($_POST['nombre'] && $_POST['precio']){

		@$nombre = $_POST['nombre'];
		@$ingredientes = $_POST['ingredientes'];
		@$precio = $_POST['precio'];
		
	  	$controlador = new ControladorAdicional();
	  	$controlador->insertarAdicional($nombre,$ingredientes,$precio);
  }
?>