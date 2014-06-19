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
				echo "*Pedido registrado con éxito</br>";
				echo "Numero de pedido: ".$this->getNroPedido();
	        	
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
				echo '<h3>Platos</h3>';
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
				echo '<h3>Adicionales</h3>';
				echo '<table id ="tablaAdicionales"><tr><td>Cantidad</td><td>Nombre</td><td>Precio</td><td>Total</td></tr>';
	       		while ($stmt->fetch()) {	       			
						echo '<tr><td>'.$cantidad.'</td><td>'.$nombre.'</td><td>'.$precio.'</td><td>'.$total.'</td></tr>';	
    			}
				echo '</table>';	        	
	        }

			$this->conexionBd->desconectar($conexion);
		}
		
		public function cancelarPedido($idPedido){
			$conexion = $this->conexionBd->conectar();
			if ($stmt = $conexion->prepare("UPDATE Pedido SET estado = 'Cancelado' WHERE  idPedido = ".$idPedido)){
				$stmt->execute();   
		        $stmt->store_result();
				echo "*Pedido Cancelado</br>";
	        }
			$this->conexionBd->desconectar($conexion);
		}
		
		public function confirmarPedido($idPedido){
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("UPDATE Pedido SET estado = 'Realizado' WHERE  idPedido = ".$idPedido)){
				$stmt->execute();   
		        $stmt->store_result();
	        }
			$this->conexionBd->desconectar($conexion);
		}
		
		public function getNroPedido(){
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'www' AND TABLE_NAME = 'Pedido'")){
		        $stmt->execute();   
		        $stmt->store_result();
		        $stmt->bind_result($idPedido);
	       		$items = array();	       		
	       		$stmt->fetch();

				return ($idPedido-1);
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);	
		}
		
		public function consultarDatosEmpresa($idPedido){
		$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT* FROM empresa WHERE idEmpresa in (select idEmpresa from usuario where usuario in (select idCajero from pedido where idPedido = ".$idPedido."))")){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($idEmpresa,$titulo,$logo,$url,$direccion,$telefono);
	       		$items = array();
				$stmt->fetch();
				echo '<table>';
				echo '<tr><td>'.$titulo.'</td></tr>';
				echo '<tr><td>'.$direccion.'</td></tr>';
				echo '<tr><td>'.$telefono.'</td></tr>';
				echo '<tr><td>'.$url.'</td></tr>';
				//echo '<tr><td>'.$idEmpresa.'</td></tr>';
				//echo '<tr><td>'.$idEmpresa.'</td></tr>';
				echo '</table>';
			}
		}
		
		public function getTotalPlatosPedido($idPedido){
			$valor = 0;
			$conexion = $this->conexionBd->conectar();
			if ($stmt = $conexion->prepare("SELECT sum(precio*cantidad) FROM plato, plato_pedido WHERE plato.idPlato = plato_pedido.idPlato and idPedido =".$idPedido)){   		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($total);
	       		$items = array();
				$stmt->fetch();
				
				$valor = $total;
			}
			return $valor;
		}
		
		function getTotalAdicionalesPedido($idPedido){
			$valor = 0;
			
			$conexion = $this->conexionBd->conectar();
			if ($stmt = $conexion->prepare("SELECT sum(precio*cantidad) FROM adicional, Adicional_pedido WHERE adicional.idAdicional = adicional_pedido.idAdicional and idPedido =".$idPedido)){   		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($total);
	       		$items = array();
				$stmt->fetch();
				$valor = $total;
			}
			return $valor;
		}
		
		function getResumenPedido($idPedido){
			$totalPlatos = $this->getTotalPlatosPedido($idPedido);
			$totalAdicionales = $this->getTotalAdicionalesPedido($idPedido);
			$subtotal = $totalPlatos + $totalAdicionales;
			$iva = $subtotal*0.16;
			$total = $subtotal + $iva;
			echo '<table>';
			echo '<tr><td>Subtotal</td><td>'.$subtotal.'</td></tr>';
			echo '<tr><td>Iva</td><td>'.$iva.'</td></tr>';
			echo '<tr><td>Total</td><td>'.$total.'</td></tr>';
			echo '</table>';
		}
		
		
	}
?>