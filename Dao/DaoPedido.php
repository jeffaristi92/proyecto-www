<?php

	require_once ('../DataBase/DataBase.php');
	require_once ('../Logico/Pedido.php');
	require_once ('../Logico/PlatoPedido.php');
	require_once ('../Logico/AdicionalPedido.php');
	
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
		
		public function insertarPlatoPedido($platoPedido){			
			
			$conexion = $this->conexionBd->conectar();
			if ($stmt = $conexion->prepare("INSERT INTO `plato_pedido`(`idPlato`, `idPedido`, `cantidad`) VALUES (?,(SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'bd_www' AND TABLE_NAME = 'pedido')-1,?)")){
	            
		        $stmt->bind_param('ii',$platoPedido->getIdPlato(),$platoPedido->getCantidad());  
		        $stmt->execute();   
		        $stmt->store_result();
				echo "*Plato Pedido registrado con exito";//mensaje para mostrar al usuario
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
		public function insertarAdicionalPedido($adicionalPedido){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `adicional_pedido`(`idAdicional`, `idPedido`, `cantidad`) VALUES (?,(SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'bd_www' AND TABLE_NAME = 'pedido')-1,?)")){
	            
		        $stmt->bind_param('ii',$adicionalPedido->getIdAdicional(),$adicionalPedido->getCantidad());  
		        $stmt->execute();   
		        $stmt->store_result();
				echo "*Adicional Pedido registrado con exito";//mensaje para mostrar al usuario
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
	}
?>