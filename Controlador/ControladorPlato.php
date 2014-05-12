<?php
	require_once ('../Dao/DaoPlato.php');
	require_once ('../Logico/Plato.php');
	
	class ControladorPlato{
		private $daoPlato;
		
		public function __construct(){
			$this->daoPlato = new DaoPlato();		
		}
		
		public function insertarPlato($nombre,$ingredientes,$fecha,$imagen,$precio,$activo){
			$plato = new Plato(0,$nombre,$ingredientes,$fecha,$imagen,$precio,$activo);
			$this->daoPlato->insertarPlato($plato);
		}
	}
?>