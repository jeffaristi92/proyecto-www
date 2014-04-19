<?php
	require_once '../Dao/DaoPlato.php';
	require_once  '../logico/Plato.php';
	
	class ControladorPlato{
		private $daoPlato;
		
		public function __construct(){
			$this->daoPlato = new DaoPlato();		
		}
		
		public function insertarPlato($nombre,$ingredientes,$fecha,$imagen,$precio,$activo,$idEmpresa){
			$plato = new Plato(0,$nombre,$ingredientes,$fecha,$imagen,$precio,$activo,$idEmpresa);
			$this->daoPlato->insertarPlato($plato);
		}
	}
?>