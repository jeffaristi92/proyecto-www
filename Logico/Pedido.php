<?php
	class Pedido {
		private $idPedido;
		private $fecha;
		private $estado;
		private $tipoPago;
		private $idCajero;
		
		public function __construct($idPedido,$fecha,$estado,$tipoPago,$idCajero){
			$this->idPedido = $idPedido;
			$this->fecha = $fecha;
			$this->estado = $estado;
			$this->tipoPago = $tipoPago;
			$this->idCajero = $idCajero; 	 		
		}
		
		public function setIdPedido($idPedido){
			$this->idPedido = $idPedido;
		}
		
		public function getIdPedido(){
			return $this->idPedido;
		}
		
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
		
		public function getFecha(){
			return $this->fecha;
		}
		
		public function setEstado($estado){
			$this->estado = $estado;
		}
		
		public function getEstado(){
			return $this->estado;
		}
		
		public function setTipoPago($tipoPago){
			$this->tipoPago = $tipoPago;
		}
		
		public function getTipoPago(){
			return $this->tipoPago;
		}
		
		public function setIdCajero($idCajero){
			$this->idCajero = $idCajero;
		}
		
		public function getIdCajero(){
			return $this->idCajero;
		}
	}
?>