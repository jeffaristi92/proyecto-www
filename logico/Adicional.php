<?php
	class Adicional {
		private $idAdicional;
		private $nombre;
		private $ingredientes;
		private $precio;
		
		public function __construct($idAdicional, $nombre, $ingredientes, $precio){
 	 		$this->idAdicional = $idAdicional;
 	 		$this->nombre = $nombre;
 	 		$this->ingredientes = $ingredientes;
 	 		$this->precio = $precio;
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
	}
?>