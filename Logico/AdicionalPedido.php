<?php
	class Pedido {
		private $idAdicional;
		private $idPedido;
		private $cantidad;
		
		public function __construct($idAdicional,$idPedido,$cantidad){
			$this->idAdicional = $idAdicional; 
			$this->idPedido = $idPedido; 	
			$this->cantidad = $cantidad;	
		}
		
		public function setIdAdicional($idAdicional){
			$this->idAdicional = $idAdicional;
		}
		
		public function getIdAdicional(){
			return $this->idAdicional;
		}
		
		public function setIdPedido($idPedido){
			$this->idPedido = $idPedido;
		}
		
		public function getIdPedido(){
			return $this->idPedido;
		}
		
		public function setCantidad($cantidad){
			$this->cantidad = $cantidad;
		}
		
		public function getCantidad(){
			return $this->cantidad;
		}
		
	}
?>