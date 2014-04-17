<?php
	class Empresa {
		private $idEmpresa;
		private $titulo;
		private $logo;
		private $url;
		private $direccion;
		private $telefono;
		
		public function __construct($idEmpresa, $titulo, $logo, $URL, $direccion, $telefono){
 	 		$this->idEmpresa = $idEmpresa;
 	 		$this->titulo = $titulo;
 	 		$this->logo = $logo;
 	 		$this->url = $URL; 
 	 		$this->direccion = $direccion; 
 	 		$this->telefono = $telefono; 
		}
		
		public function setIdEmpresa($id){
			$this->idEmpresa = $id;
		}
		public function getIdEmpresa(){
			return $this->idEmpresa;
		}
		
		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}
		
		public function getTitulo(){
			return $this->titulo;
		}
		
		public function setLogo($logo){
			$this->logo = $logo;
		}
		public function getLogo(){
			return $this->logo;
		}
		
		public function setUrl($url){
			$this->url = $url;	
		}
		public function getUrl(){
			return $this->url;	
		}
		
		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}
		public function getDireccion(){
			return $this->direccion;
		}
		
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getTelefono(){
			return $this->telefono;
		}
	}
?>