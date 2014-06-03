<?php
  
 	require ('../Dao/DaoPlato.php');
 	$daoPlato = new DaoPlato();

 	if($_GET['accion'] == 'desactivar' and $_GET['id']){

 		$idPlato = $_GET['id'];
 		$daoPlato->desactivarPlato($idPlato);

 	}else if($_GET['accion'] == 'activar' and $_GET['id']){ 		

 		$idPlato = $_GET['id'];
    	$daoPlato->activarPlato($idPlato);

 	}else if($_GET['accion'] == 'activos' and @!$_GET['id'] and $_GET['idEmp']){ 		
 		$idEmpresa = $_GET['idEmp'];
    	$daoPlato->consultarPlatosActivos($idEmpresa);
 	}
 	else if($_GET['accion'] == 'inactivos' and @!$_GET['id'] and $_GET['idEmp']){ 		
 		$idEmpresa = $_GET['idEmp'];
    	$daoPlato->consultarPlatosInactivos($idEmpresa);
 	}
?>