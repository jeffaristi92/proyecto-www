<html>
<head>
<link href="../css/stylesFactura.css" rel="stylesheet"> 
</head>
<body>
<?php
 require "../Dao/DaoPedido.php";
 $idPedido = @$_GET['idPedido'];
 
 $daoPedido = new DaoPedido();
 $daoPedido->consultarPedido($idPedido);
 $daoPedido->consultarPlatosPedido($idPedido);
 $daoPedido->consultarAdicionalesPedido($idPedido);
?>
<a href="javascript:print()">Imprimir</a>
</body>
</html>