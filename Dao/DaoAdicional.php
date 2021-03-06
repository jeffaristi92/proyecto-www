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

			if ($stmt = $conexion->prepare(
				"INSERT INTO `Adicional`(`Nombre`, `ingredientes`, `precio`, `idEmpresa`) VALUES (?,?,?,?)"))
			{
	        
		        $stmt->bind_param('ssdd',$adicional->getNombre(),$adicional->getIngredientes(),$adicional->getPrecio(),
		        	              $adicional->getIdEmpresa());  
		        $stmt->execute();   
		        $stmt->store_result();
				echo "*Adicional registrado con éxito";//mensaje para mostrar al usuario
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}

		public function consultarAdicionales($idEmpresa){			
			
			$conexion = $this->conexionBd->conectar();	
			if ($stmt = $conexion->prepare("SELECT idAdicional, nombre, precio FROM Adicional WHERE Adicional.idEmpresa =$idEmpresa")){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($id, $value, $precio);
	       		$items = array();
				       		
	       		while ($stmt->fetch()) {	       			
						echo '<option value="'.$id."-".$precio.'">'.$value.' - $'.$precio.'</option>';	
    			}	        	
	        }

			$this->conexionBd->desconectar($conexion);				
		}


		
	}
?>