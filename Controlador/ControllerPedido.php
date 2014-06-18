<?php
	
require 'ControladorPedido.php';
	session_start();
    //if($_GET['fecha'] && $_GET['estado'] && $_GET['tipoPago'] && $_GET['idCajero']){

    	@$fecha = $_GET['fecha'];
    	@$estado = 'En proceso';
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
		
		
		$valores = split("," , $listaPlatos);
		
		for ($i=0; $i<count($valores); $i++){

			$arreglo = 	split("-" , $valores[$i]);
			$controlador->insertarPlatoPedido($arreglo[0], $arreglo[1]);
		}

		$valores = split("," , $listaAdicionales);

		for ($i=0; $i<count($valores); $i++){

			$arreglo = split("-", $valores[$i]);  
			$controlador->insertarAdicionalPedido($arreglo[0], $arreglo[1]);
		}
?>