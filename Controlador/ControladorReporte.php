<?php

require_once ('../Dao/DaoReporte.php');

	class ControladorReporte{
		
		private $daoReporte;
		
		public function __construct(){

			$this->daoReporte = new DaoReporte();	
		}

		public function reporteVentasTotales(){
			
			$this->daoReporte->consultarVentas();	
		}

	}//Fin clase
?>
