<?php	
   session_start();
   $opcion = @$_GET['opcion'];

	if(@$_SESSION['acceso'] == 1){
	}else{
		echo "<script type='text/javascript' language='javascript'>
				location.href='../index.php';
			</script>";	
	}	
?>
<html>
<head>
<link href="../css/stylesFactura.css" rel="stylesheet"> 
</head>
<body>
<?php
 require "../Dao/DaoPedido.php";
 $idPedido = @$_GET['idPedido'];
 
 $daoPedido = new DaoPedido();
 $daoPedido->confirmarPedido($idPedido);
 $daoPedido->consultarDatosEmpresa($idPedido);
 $daoPedido->consultarPedido($idPedido);
 $daoPedido->consultarPlatosPedido($idPedido);
 $daoPedido->consultarAdicionalesPedido($idPedido);
 $daoPedido->getResumenPedido($idPedido);
?>
<a href="javascript:print()">Imprimir</a>
</body>
</html>