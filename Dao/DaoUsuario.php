<?php

	require_once ('../DataBase/DataBase.php');
	require_once ('../Logico/Usuario.php');
	
	class DaoUsuario {
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function insertarUsuario($usuario){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `Usuario`(`usuario`, `contrasena`, `rol`, `idEmpresa`) VALUES (?,?,?,?)")){
	        
		        $stmt->bind_param('ssss',$usuario->getUsuario(),$usuario->getContrasena(),$usuario->getRol(),$usuario->getIdEmpresa());  
		        $stmt->execute();   
		        $stmt->store_result();		        
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
	}
?>