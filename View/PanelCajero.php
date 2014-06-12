<?php	
   session_start();
   $opcion = @$_GET['opcion'];

	if(@$_SESSION['acceso'] == 1 && @$_SESSION['rol'] == 'cajero'){
		if($opcion != null){
			if($opcion =='consultar'){
				include ('consultaPedido.php');
			}else{
				include ('panelPedido.php');
			}
		}else{
			include ('panelPedido.php');
		}
	}else{
		echo "<script type='text/javascript' language='javascript'>
				location.href='../index.php';
			</script>";	
	}	
?>