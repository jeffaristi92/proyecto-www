<?php
	
require 'ControladorAdicional.php';
	
	if($_GET['nombre'] && $_GET['precio'] && $_GET['idEmpresa']){

		@$nombre = $_GET['nombre'];
		@$ingredientes = $_GET['ingredientes'];
		@$precio = $_GET['precio'];
		@$idEmpresa = $_GET['idEmpresa'];
		
	  	$controlador = new ControladorAdicional();
	  	$controlador->insertarAdicional($nombre, $ingredientes, $precio, $idEmpresa);
  }else{
  	echo "Por favor Ingrese todos los datos";
  }
?>