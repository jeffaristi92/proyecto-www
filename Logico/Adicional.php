<?php
	class Adicional {
		private $idAdicional;
		private $nombre;
		private $ingredientes;
		private $precio;
		private $idEmpresa;
		
		public function __construct($nombre, $ingredientes, $precio, $idEmpresa){ 	 		
 	 		$this->nombre = $nombre;
 	 		$this->ingredientes = $ingredientes;
 	 		$this->precio = $precio;
 	 		$this->idEmpresa = $idEmpresa;
		}
		
		public function setIdAdicional($id){
			$this->idAdicional = $id;
		}
		public function getIdAdicional(){
			return $this->idAdicional;
		}
		
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		
		public function getNombre(){
			return $this->nombre;
		}
		
		public function setIngredientes($ingredientes){
			$this->ingredientes = $ingredientes;
		}
		public function getIngredientes(){
			return $this->ingredientes;
		}
		
		public function setPrecio($precio){
			$this->precio = $precio;	
		}
		public function getPrecio(){
			return $this->precio;	
		}

		public function setIdEmpresa($idEmpresa){
			$this->idEmpresa = $idEmpresa;	
		}
		public function getIdEmpresa(){
			return $this->idEmpresa;	
		}
	}
?>