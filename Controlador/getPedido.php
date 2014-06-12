<?php
 require "../Dao/DaoPedido.php";
 $idPedido = @$_GET['idPedido'];
 
 $daoPedido = new DaoPedido();
 $daoPedido->consultarPedido($idPedido);
 $daoPedido->consultarPlatosPedido($idPedido);
 $daoPedido->consultarAdicionalesPedido($idPedido);
 $daoPedido->getResumenPedido($idPedido);
?>