<?php

	require_once ('../DataBase/DataBase.php');
	require_once  ('../Logico/Empresa.php');
	
	class DaoEmpresa {
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function insertarEmpresa($empresa){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `Empresa`(`titulo`, `logo`, `url`, `direccion`, `telefono`) VALUES (?,?,?,?,?)")){
	        
		        $stmt->bind_param('sssss',$empresa->getTitulo(),$empresa->getLogo(),$empresa->getUrl(),$empresa->getDireccion(),$empresa->getTelefono());  
		        $stmt->execute();  
		        $stmt->store_result();
				
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}

		public function consultarEmpresas(){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT idEmpresa, titulo FROM Empresa")){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($id, $value);
	       		$items = array();
	       		$contador = 0;
	       		/*Se utiliza el contador para no mostar la primer empresa ya que dicha empresa
	       		es ficticia y sólo sirve para darle acceso al admin general*/
	       		while ($stmt->fetch()) {

	       			if($contador != 0){
						echo '<option value="'.$id.'">'.$value.'</option>';					
					}
					$contador = 1;
    			}	        	
	        }

			$this->conexionBd->desconectar($conexion);				
		}
		
	}
?>
