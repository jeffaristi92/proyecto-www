<?php

	require_once ('../DataBase/DataBase.php');
	require_once ('../Logico/Plato.php');
	
	class DaoPlato {
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function insertarPlato($plato){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `Plato`(`nombre`, `ingredientes`, `fecha`, `imagen`, `Precio`, `activo`, `idEmpresa`) VALUES (?,?,?,?,?,?,?)")){
	        
		        $stmt->bind_param('ssssdii',$plato->getNombre(),$plato->getIngredientes(),$plato->getFecha(),$plato->getImagen(),$plato->getPrecio(),$plato->getActivo(),$plato->getIdEmpresa());  
		        $stmt->execute();   
		        $stmt->store_result();
				echo "*Plato registrado con éxito";//mensaje para mostrar al usuario
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}

		public function consultarPlatosActivos(){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT idPlato, nombre FROM Plato WHERE activo=1")){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($id, $value);
	       		$items = array();
	       			       		
	       		while ($stmt->fetch()) {	       			
	       			echo '<option value="'.$id.'" onclick="inactivarPlato()">'.$value.'</option>';		
    			}
	        }
			$this->conexionBd->desconectar($conexion);				
		}//fin método consultarPlatosActivos
		
		public function consultarPlatosInactivos(){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT idPlato, nombre FROM Plato WHERE activo=0")){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($id, $value);
	       		$items = array();
	       			       		
	       		while ($stmt->fetch()) {	       			
	       			echo '<option value="'.$id.'" onclick="activarPlato()">'.$value.'</option>';		
    			}
	        }
			$this->conexionBd->desconectar($conexion);				
		}//fin método consultarPlatosInactivos

		public function desactivarPlato($idPlato){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("UPDATE Plato SET activo = 0 WHERE idPlato = $idPlato")){
				        		
				$stmt->execute();   
	        }

			$this->conexionBd->desconectar($conexion);				
		}//fin método desactivarPlato

		public function activarPlato($idPlato){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("UPDATE Plato SET activo = 1 WHERE idPlato = $idPlato")){				        		
				$stmt->execute();   
	        }

			$this->conexionBd->desconectar($conexion);				
		}//fin método activarPlato

	}
?>