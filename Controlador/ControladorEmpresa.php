<?php
	require_once ('../Dao/DaoEmpresa.php');
	require_once  ('../Logico/Empresa.php');
	
	class ControladorEmpresa{
		private $daoEmpresa;
		
		public function __construct(){
			$this->daoEmpresa = new DaoEmpresa();		
		}
		
		public function insertarEmpresa($titulo, $logo, $url, $direccion, $telefono){
			
			$empresa = new Empresa($titulo, $logo, $url, $direccion, $telefono);
			$this->daoEmpresa->insertarEmpresa($empresa);
		}
	}
?>