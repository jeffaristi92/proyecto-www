<?php

	require_once ('../DataBase/DataBase.php');

	$conexionBd = new DataBase();

    $conexion = $conexionBd->conectar();
    
    if ($result = $conexion->query("SELECT * FROM Pedido")){
	    $items = array();
        while( $row = $result->fetch_Object()){
            $tempArray = array();
            $items[] = $row;
        }
        echo json_encode($items);
        
        $result->close();
		$conexionBd->desconectar($conexion);
    }
?>