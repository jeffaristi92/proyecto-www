<?php

	require_once ('../DataBase/DataBase.php');
	require_once ('../Logico/Adicional.php');
	
	class DaoAdicional {
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function insertarAdicional($adicional){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `Adicional`(`Nombre`, `ingredientes`, `precio`) VALUES (?,?,?)")){
	        
		        $stmt->bind_param('ssd',$adicional->getNombre(),$adicional->getIngredientes(),$adicional->getPrecio());  
		        $stmt->execute();   
		        $stmt->store_result();
				echo "*Adicional registrado con éxito";//mensaje para mostrar al usuario
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}

		public function consultarAdicionales(){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT idAdicional, nombre FROM Adicional")){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($id, $value);
	       		$items = array();	       		
	       		while ($stmt->fetch()) {	       			
						echo '<option value="'.$id.'">'.$value.'</option>';	
    			}	        	
	        }

			$this->conexionBd->desconectar($conexion);				
		}


		
	}
?>