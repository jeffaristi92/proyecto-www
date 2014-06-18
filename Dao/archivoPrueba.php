<?php
	require "DaoPedido.php";
	
	$daoPedido = new DaoPedido();
	
	echo "Hola: ".$daoPedido->getNroPedido();
	$daoPedido->consultarPedido(29);
	//$daoPedido->confirmarPedido(29);
	//$daoPedido->cancelarPedido(29);

?>