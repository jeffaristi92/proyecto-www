<?php
	
	class DataBase{
	
		//CAMBIAR VARIABLES DE ACUERDO A SU CONFIGURACIÓN
		//LO IDEAL SERÍA QUE TODOS TUVIERAMOS LOS MISMOS NOMBRES PARA NO ESTAR MODIFICANDO ESTE ARCHIVO

		private $servidor = 'localhost';
		//private $dbName = 'bd_www'; 
		private $dbName = 'www';
		private $user = 'root';
		//private $password = 'root';
		private $password = 'john123';
		private $mysqli;
		
	    public function conectar() {

	    	$mysqli = new mysqli($this->servidor, $this->user, $this->password, $this->dbName);
			
			if (mysqli_connect_errno($mysqli)) {
			    echo "Failed to connect to MySQL: " . mysqli_connect_error();
			    exit();
			}

			return $mysqli;	       
	    }

	    public function desconectar($conexion) {

	        mysqli_close($conexion);
	    }

	}//FIN Clase DataBase
?>
