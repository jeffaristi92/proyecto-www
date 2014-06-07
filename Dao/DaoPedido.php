<?php

	require_once ('../DataBase/DataBase.php');
	require_once ('../Logico/Pedido.php');
	
	class DaoPedido {
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function insertarPedido($pedido){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `Pedido`(`fecha`,`estado`,`tipoPago`,`idCajero`) VALUES (?,?,?,?)")){
	            
		        $stmt->bind_param('ssss',$pedido->getFecha(),$pedido->getEstado(),$pedido->getTipoPago(),$pedido->getIdCajero());  
		        $stmt->execute();   
		        $stmt->store_result();
				echo "*Pedido registrado con exito";//mensaje para mostrar al usuario
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
	}
?>