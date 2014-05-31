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

		public function consultarPlatos(){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT idPlato, nombre FROM Plato")){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($id, $value);
	       		$items = array();
	       			       		
	       		while ($stmt->fetch()) {
	       			
	       			echo '<option value="'.$id.'">'.$value.'</option>';		
    			}
	        }

			$this->conexionBd->desconectar($conexion);				
		}//fin método consultarPlatos
		
	}
?>