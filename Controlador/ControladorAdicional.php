<?php
	require_once ('../Dao/DaoAdicional.php');
	require_once ('../Logico/Adicional.php');
	
	class ControladorAdicional{
		private $daoAdicional;
		
		public function __construct(){
			$this->daoAdicional = new DaoAdicional();		
		}
		
		public function insertarAdicional($nombre, $ingredientes, $precio, $idEmpresa){
			$adicional = new Adicional($nombre, $ingredientes, $precio, $idEmpresa);
			$this->daoAdicional->insertarAdicional($adicional);
		}
	}
?>