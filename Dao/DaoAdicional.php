<?php

	require_once '../DataBase/DataBase.php';
	require_once  '../logico/Adicional.php';
	
	class DaoAdicional {
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function insertarAdicional($adicional){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `adicional`(`Nombre`, `ingredientes`, `precio`) VALUES (?,?,?)")){
	        
		        $stmt->bind_param('ssd',$adicional->getNombre(),$adicional->getIngredientes(),$adicional->getPrecio());  
		        $stmt->execute();   
		        $stmt->store_result();
				
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
	}
?>