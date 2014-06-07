<?php
	class PlatoPedido {
		private $idPlato;
		private $idPedido;		
		private $cantidad;
		
		public function __construct($idPlato, $idPedido,$cantidad){
			$this->idPlato = $idPlato;
			$this->idPedido = $idPedido;			
			$this->cantidad = $cantidad;	 		
		}
				
		public function setIdPlato($id){
			$this->idPlato = $id;
		}
		public function getIdPLato(){
			return $this->idAPlato;
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