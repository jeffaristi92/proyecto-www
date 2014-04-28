<?php
	class Usuario {
		private $usuario;
		private $contrasena;
		private $rol;
		private $idEmpresa;
		
		public function __construct($usuario, $contrasena, $rol, $idEmpresa){
 	 		$this->usuario = $usuario;
 	 		$this->contrasena = $contrasena;
 	 		$this->rol = $rol;
 	 		$this->idEmpresa = $idEmpresa;
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		
		public function setContrasena($contrasena){
			$this->contrasena = $contrasena;
		}
		
		public function getContrasena(){
			return $this->contrasena;
		}
		
		public function setRol($rol){
			$this->rol = $rol;
		}
		public function getRol(){
			return $this->rol;
		}
		
		public function setIdEmpresa($idEmpresa){
			$this->idEmpresa = $idEmpresa;	
		}
		public function getIdEmpresa(){
			return $this->idEmpresa;	
		}
	}
?>