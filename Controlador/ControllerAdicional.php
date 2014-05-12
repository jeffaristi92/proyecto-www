<?php
	
require 'ControladorAdicional.php';
	
	if($_GET['nombre'] && $_GET['precio']){

		@$nombre = $_GET['nombre'];
		@$ingredientes = $_GET['ingredientes'];
		@$precio = $_GET['precio'];
		
	  	$controlador = new ControladorAdicional();
	  	$controlador->insertarAdicional($nombre,$ingredientes,$precio);
  }
?>