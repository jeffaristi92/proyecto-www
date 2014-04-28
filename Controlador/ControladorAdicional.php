<?php
	require_once ('../Dao/DaoAdicional.php');
	require_once ('../Logico/Adicional.php');
	
	class ControladorAdicional{
		private $daoAdicional;
		
		public function __construct(){
			$this->daoAdicional = new DaoAdicional();		
		}
		
		public function insertarAdicional($nombre,$ingredientes,$precio){
			$adicional = new Adicional(0,$nombre,$ingredientes,$precio);
			$this->daoAdicional->insertarAdicional($adicional);
		}
	}
?>