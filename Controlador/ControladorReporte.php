<?php

require_once ('../Dao/DaoReporte.php');

	class ControladorReporte{
		
		private $daoReporte;
		
		public function __construct(){

			$this->daoReporte = new DaoReporte();	
		}

		public function reporteVentasTotales($idEmpresa){
			
			$this->daoReporte->consultarVentas($idEmpresa);	
		}

		public function reporteMasVendidos($idEmpresa){
			
			$this->daoReporte->consultarMasVendidos($idEmpresa);	
		}		

	}//Fin clase
?>
