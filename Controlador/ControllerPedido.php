<?php
	
require 'ControladorPedido.php';
	session_start();
    //if($_GET['fecha'] && $_GET['estado'] && $_GET['tipoPago'] && $_GET['idCajero']){

    	@$fecha = $_GET['fecha'];
    	@$estado = $_GET['estado'];
        @$tipoPago = $_GET['tipoPago'];
        @$idCajero = $_SESSION['usuario'];
		@$listaPlatos = $_GET["listaPlatos"];
		@$listaAdicionales = $_GET["listaAdicionales"];
		
		/*
		for ($i=0;$i<count($listaPlatos);$i++){     
			echo "<br> Plato " . $i . ": " . $listaPlatos[$i];    
		} 
		*/
      	$controlador = new ControladorPedido();
      	$controlador->insertarPedido($fecha, $estado, $tipoPago, $idCajero);
		
		for ($i=0; $i<count($listaPlatos); $i++){
			$valores = split("-", $listaPlatos[$i]);
			//Qué recibe insertarPlatoPedido? id y cantidad? no me queda claro
			//si se supone que recibe algo como esto:
			// "4 - Carne a la plancha"
			$controlador->insertarPlatoPedido($valores[0], $valores[1]);
		}

		for ($i=0; $i<count($listaAdicionales); $i++){
			$valores = split("-", $listaAdicionales[$i]);     
			$controlador->insertarAdicionalPedido($valores[0], $valores[1]);
		}
?>