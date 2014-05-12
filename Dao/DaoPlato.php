<?php
    session_start();
	require_once ('../DataBase/DataBase.php');
	require_once ('../Logico/Plato.php');
	
	class DaoPlato {
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function insertarPlato($plato){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `Plato`(`nombre`, `ingredientes`, `fecha`, `imagen`, `Precio`, `activo`, `idEmpresa`) VALUES (?,?,?,?,?,?,
                                            (SELECT `idEmpresa` FROM `usuario` WHERE `usario`= " . $_SESSION['usuario']  . "))")){
	        
		        $stmt->bind_param('ssssdii',$plato->getNombre(),$plato->getIngredientes(),$plato->getFecha(),$plato->getImagen(),$plato->getPrecio(),$plato->getActivo(),$plato->getIdEmpresa());  
		        $stmt->execute();   
		        $stmt->store_result();
				
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
	}
?>