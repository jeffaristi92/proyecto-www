<?php
	
require 'ControladorPlato.php';
	
    if($_GET['nombre'] && $_GET['fecha'] && $_GET['precio'] && $_GET['activo'] && $_GET['idEmpresa']){

    	@$nombre = $_GET['nombre'];
    	@$ingredientes = $_GET['ingredientes'];
        @$fecha = $_GET['fecha'];
        @$imagen = $_GET['imagen'];
    	@$precio = $_GET['precio'];
        @$activo = $_GET['activo'];
        @$idEmpresa = $_GET['idEmpresa'];

        if($activo == "si"){
            $activo = 1;
        }else{
            $activo = 0;
        }
    	
      	$controlador = new ControladorPlato();
      	$controlador->insertarPlato($nombre,$ingredientes,$fecha,$imagen,$precio,$activo,$idEmpresa);
    }
?>