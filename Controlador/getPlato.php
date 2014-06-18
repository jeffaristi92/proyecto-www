<?php
  
 	require ('../Dao/DaoPlato.php');

 	if($_GET['idEmpresa']){

 		$idEmpresa = $_GET['idEmpresa'];
    	$daoPlato = new DaoPlato();
    	$daoPlato->consultarPlatos($idEmpresa);
 	}
?>
