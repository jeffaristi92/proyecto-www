<?php
	require_once ('../Dao/DaoPedido.php');
	require_once ('../Logico/Pedido.php');
	require_once ('../Logico/PlatoPedido.php');
	require_once ('../Logico/AdicionalPedido.php');
	
	class ControladorPedido{
		private $daoPedido;
		
		public function __construct(){
			$this->daoPedido = new DaoPedido();		
		}
		
		public function insertarPedido($fecha,$estado,$tipoPago,$idCajero){
			$Pedido = new Pedido(0,$fecha,$estado,$tipoPago,$idCajero);		
			$this->daoPedido->insertarPedido($Pedido);
		}
		
		public function insertarPlatoPedido($idPlato, $cantidad){
			$platoPedido = new PlatoPedido($idPlato, 0, $cantidad);		
			$this->daoPedido->insertarPlatoPedido($platoPedido);
		}
		
		public function insertarAdicionalPedido($idAdicional,$cantidad){
			$adicionalPedido = new AdicionalPedido($idAdicional,0,$cantidad);		
			$this->daoPedido->insertarAdicionalPedido($adicionalPedido);
		}
	}
?>