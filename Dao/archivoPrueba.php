<?php
	require "DaoPedido.php";
	
	$daoPedido = new DaoPedido();
	
	echo "Hola: ".$daoPedido->getNroPedido();
	$daoPedido->consultarPedido(29);

?>