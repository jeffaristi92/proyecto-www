<?php
	
require 'ControladorPlato.php';
	
	@$nombre = $_POST['nombre'];
	@$ingredientes = $_POST['ingredientes'];
    @$fecha = $_POST['fecha'];
    @$imagen = $_POST['imagen'];
	@$precio = $_POST['precio'];
    @$activo = $_POST['activo'];
    @$idEmpresa = $_POST['idEmpresa'];

    if($activo == "si"){
        $activo = 1;
    }else{
        $activo = 0;
    }
	
  	$controlador = new ControladorPlato();
  	$controlador->insertarPlato($nombre,$ingredientes,$fecha,$imagen,$precio,$activo,$idEmpresa);
?>