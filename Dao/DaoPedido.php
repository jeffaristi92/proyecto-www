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
		        //mensaje para mostrar al usuario
				echo "*Pedido registrado con éxito";
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
		public function insertarPlatoPedido($platoPedido){			
			
			$conexion = $this->conexionBd->conectar();
			if ($stmt = $conexion->prepare("INSERT INTO `Plato_Pedido`(`idPlato`, `idPedido`, `cantidad`) VALUES (?,(SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'www' AND TABLE_NAME = 'Pedido')-1,?)")){
	            
		        $stmt->bind_param('ii',$platoPedido->getIdPlato(),$platoPedido->getCantidad());  
		        $stmt->execute();   
		        $stmt->store_result();
		        //No es necesario mostrar esto
				//echo "*Plato Pedido registrado con exito";
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
		public function insertarAdicionalPedido($adicionalPedido){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("INSERT INTO `Adicional_Pedido`(`idAdicional`, `idPedido`, `cantidad`) VALUES (?,(SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'www' AND TABLE_NAME = 'Pedido')-1,?)")){
	            
		        $stmt->bind_param('ii',$adicionalPedido->getIdAdicional(),$adicionalPedido->getCantidad());  
		        $stmt->execute();   
		        $stmt->store_result();
		        //No es necesario mostrar esto
				//echo "*Adicional Pedido registrado con exito";
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}
		
		public function consultarPedido($idPedido){
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT* FROM Pedido WHERE idPedido=".$idPedido)){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($pedido,$fecha,$estado,$tipoPago,$idCajero);
	       		$items = array();	       		
	       		$stmt->fetch();
				echo '<table id="datosPedido"><tr><td>Numero de pedido</td><td>'.$pedido.'</td></tr>';
				echo '<tr><td>Fecha</td><td>'.$fecha.'</td></tr>';
				echo '<tr><td>Estado</td><td>'.$estado.'</td></tr>';
				echo '<tr><td>Tipo de pago</td><td>'.$tipoPago.'</td></tr>';
				echo '<tr><td>Cajero</td><td>'.$idCajero.'</td></tr></table>';
	        }

			$this->conexionBd->desconectar($conexion);		
		}
		
		public function consultarPlatosPedido($idPedido){
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT cantidad, nombre, precio, (cantidad*precio) as total FROM Plato, plato_pedido WHERE plato_pedido.idPlato = plato.idPlato and plato_pedido.idPedido =".$idPedido)){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($cantidad,$nombre,$precio,$total);
	       		$items = array();
				echo '<h1>Platos</h1>';
				echo '<table id ="tablaPlatos"><tr><td>Cantidad</td><td>Nombre</td><td>Precio</td><td>Total</td></tr>';
	       		while ($stmt->fetch()) {	       			
						echo '<tr><td>'.$cantidad.'</td><td>'.$nombre.'</td><td>'.$precio.'</td><td>'.$total.'</td></tr>';	
    			}
				echo '</table>';	        	
	        }

			$this->conexionBd->desconectar($conexion);		
		}
		
		public function consultarAdicionalesPedido($idPedido){
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT cantidad, nombre, precio, (cantidad*precio) as total FROM Adicional, adicional_pedido WHERE adicional_pedido.idAdicional = adicional.idAdicional and adicional_pedido.idPedido =".$idPedido)){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($cantidad,$nombre,$precio,$total);
	       		$items = array();
				echo '<h1>Adicionales</h1>';
				echo '<table id ="tablaAdicionales"><tr><td>Cantidad</td><td>Nombre</td><td>Precio</td><td>Total</td></tr>';
	       		while ($stmt->fetch()) {	       			
						echo '<tr><td>'.$cantidad.'</td><td>'.$nombre.'</td><td>'.$precio.'</td><td>'.$total.'</td></tr>';	
    			}
				echo '</table>';	        	
	        }

			$this->conexionBd->desconectar($conexion);
		}
		
		public function cancelarPedido($idPedido){
		}
		
		public function confirmarPedido($idPedido){
		}
		
	}
?>