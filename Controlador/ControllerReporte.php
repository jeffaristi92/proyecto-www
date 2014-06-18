<?php

  require_once ('ControladorReporte.php');

  if($_GET['idEmpresa']){

  	$idEmpresa = $_GET['idEmpresa'];

  	$controlador = new ControladorReporte();  
  	$controlador->reporteVentasTotales($idEmpresa);
  }
?>