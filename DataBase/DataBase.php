<?php
	
	class DataBase{
	
		private $servidor = 'localhost';		
		private $dbName = 'clubtibu_www';
		private $user = 'clubtibu_user';		
		private $password = '9!i&zy$IA@ig35WWXqaGs9x';
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
