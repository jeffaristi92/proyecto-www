<?php
	
require 'ControladorPedido.php';
	
    if($_GET['fecha'] && $_GET['estado'] && $_GET['tipoPago'] && $_GET['idCajero']){

    	@$fecha = $_GET['fecha'];
    	@$estado = $_GET['estado'];
        @$tipoPago = $_GET['tipoPago'];
        @$idCajero = $_GET['idCajero'];


      	$controlador = new ControladorPedido();
      	$controlador->insertarPedido($fecha,$estado,$tipoPago,$idCajero);
    }
?>