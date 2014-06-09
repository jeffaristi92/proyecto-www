<?php
	class Plato {
		private $idPlato;
		private $nombre;
		private $ingredientes;
		private $fecha;
        private $imagen;
        private $precio;
        private $activo;
        private $idEmpresa;
		
		public function __construct($idPlato, $nombre, $ingredientes, $fecha, $imagen, $precio, $activo, $idEmpresa){
 	 		$this->idPlato = $idPlato;
 	 		$this->nombre = $nombre;
 	 		$this->ingredientes = $ingredientes;
            $this->fecha = $fecha;
            $this->imagen = $imagen;
 	 		$this->precio = $precio;
 	 		$this->activo = $activo;
 	 		$this->idEmpresa = $idEmpresa;
		}
		
		public function setIdPlato($id){
			$this->idPlato = $id;
		}
		public function getIdPLato(){
			return $this->idPlato;
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
		
		public function setFecha($fecha){
			$this->fecha = $fecha;	
		}
		public function getFecha(){
			return $this->fecha;	
		}
        		
		public function setImagen($Imagen){
			$this->imagen = $imagen;	
		}
		public function getImagen(){
			return $this->imagen;	
		}
        		
		public function setPrecio($precio){
			$this->precio = $precio;	
		}
		public function getPrecio(){
			return $this->precio;	
		}
        		
		public function setActivo($activo){
			$this->activo = $activo;	
		}
		public function getActivo(){
			return $this->activo;	
		}
        		
		public function setIdEmpresa($id){
			$this->idEmpresa = $id;	
		}
		public function getIdEmpresa(){
			return $this->idEmpresa;	
		}
	}
?>