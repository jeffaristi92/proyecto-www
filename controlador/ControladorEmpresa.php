<?php
	require_once '../Dao/DaoEmpresa.php';
	require_once  '../logico/Empresa.php';
	
	class ControladorEmpresa{
		private $daoEmpresa;
		
		public function __construct(){
			$this->daoEmpresa = new DaoEmpresa();		
		}
		
		public function insertarEmpresa($titulo,$logo,$url,$direccion,$telefono){
			$empresa = new Empresa(0,$titulo,$logo,$url,$direccion,$telefono);
			//echo $this->empresa->getTitulo();
			$this->daoEmpresa->insertarEmpresa($empresa);
		}
	}
?>