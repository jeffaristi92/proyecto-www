<?php

	require_once '../DataBase/DataBase.php';
	require_once  '../logico/Empresa.php';
	
	class DaoEmpresa {
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function insertarEmpresa($empresa){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `empresa`(`titulo`, `logo`, `url`, `direccion`, `telefono`) VALUES (?,?,?,?,?)")){
	        
		        $stmt->bind_param('sssss',$empresa->getTitulo(),$empresa->getLogo(),$empresa->getUrl(),$empresa->getDireccion(),$empresa->getTelefono());  
		        $stmt->execute();   
		        $stmt->store_result();
				
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
	}
?>