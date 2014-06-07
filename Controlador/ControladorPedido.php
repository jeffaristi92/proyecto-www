<?php
	require_once ('../Dao/DaoPedido.php');
	require_once ('../Logico/Pedido.php');
	
	class ControladorPedido{
		private $daoPedido;
		
		public function __construct(){
			$this->daoPedido = new DaoPedido();		
		}
		
		public function insertarPedido($fecha,$estado,$tipoPago,$idCajero){
			$UPedido = new Pedido(0,$fecha,$estado,$tipoPago,$idCajero);			
			$this->daoPedido->insertarPedido($Pedido);
		}
	}
?>