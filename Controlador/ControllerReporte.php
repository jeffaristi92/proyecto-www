<?php

  require_once ('ControladorReporte.php');

  if($_GET['idEmpresa'] && $_GET['reporte']){

  	$idEmpresa = $_GET['idEmpresa'];
  	$reporte = $_GET['reporte'];
  	$controlador = new ControladorReporte();  

  	if($reporte == 'reporte1'){
  		$controlador->reporteVentasTotales($idEmpresa);

  	}else if($reporte == 'reporte2'){

  		$controlador->reporteMasVendidos($idEmpresa);
  	}
  }
?>