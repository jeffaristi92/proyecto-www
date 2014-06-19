<?php
  
 	require ('../Dao/DaoAdicional.php');
	
	if($_GET['idEmpresa']){
		$idEmpresa = $_GET['idEmpresa'];
    	$daoPlato = new DaoAdicional();
    	$daoPlato->consultarAdicionales($idEmpresa);
	}
?>
