<?php
 require "../Dao/DaoPedido.php";
 $idPedido = @$_GET['idPedido'];
 $idEmpresa = @$_GET['idEmpresa'];
 
 
 $daoPedido = new DaoPedido();
 if($daoPedido->getEmpresaPedido($idPedido) == $idEmpresa){
	 $daoPedido->consultarPedido($idPedido);
	 $daoPedido->consultarPlatosPedido($idPedido);
	 $daoPedido->consultarAdicionalesPedido($idPedido);
	 $daoPedido->getResumenPedido($idPedido);
 }else{
 	echo '*No se encontro el pedido';
 }
?>