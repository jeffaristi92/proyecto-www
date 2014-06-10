<?php

	require_once ('../DataBase/DataBase.php');
	
	class DaoReporte{
		private $conexionBd;

		public function __construct(){		
			$this->conexionBd = new DataBase();
		}
		
		public function consultarVentas(){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT nombre, precio, info.cantidad FROM Plato, 
													(SELECT idPlato, cantidad FROM Pedido, Plato_Pedido 
														WHERE estado = 'Realizado' 
														AND Pedido.idPedido = Plato_Pedido.idPedido) AS info
											WHERE Plato.idPlato = info.idPlato")){
				        		
				$stmt->execute();   
		        $stmt->store_result();			
	        	$stmt->bind_result($nombre, $precio, $cantidad);
	       		$datos = array();
	       		$datos[0] = Array ('Nombre', 'Precio', 'Cantidad');

	       		$contador = 1;
	       		while ($stmt->fetch()) {	       			
					
					$datos[$contador] = Array("$nombre", $precio, $cantidad);					
					$contador++;
    			}	        	
    			echo json_encode($datos); 
	        }
			$this->conexionBd->desconectar($conexion);				
		}//Fin metodo consultarVentas
	}
?>