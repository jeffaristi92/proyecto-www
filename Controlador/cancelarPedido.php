<?php
 require "../Dao/DaoPedido.php";
 $idPedido = @$_GET['idPedido'];
 
 $daoPedido = new DaoPedido();
 $daoPedido->cancelarPedido($idPedido);
?>