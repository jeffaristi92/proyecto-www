<?php

require '../DataBase/DataBase.php';

	class DaoLogin{

		private $conexionBd;

		public function __construct(){		

			$this->conexionBd = new DataBase();
		}

		public function consultarDatos($correo, $password){			
			
			$conexion = $this->conexionBd->conectar();

			if ($stmt = $conexion->prepare("SELECT correo, password FROM usuarios WHERE correo = ? LIMIT 1")){
	        
		        $stmt->bind_param('s', $correo);  
		        $stmt->execute();   
		        $stmt->store_result();
			
	        	$stmt->bind_result($u_correo, $u_password);
	       		$stmt->fetch();			

	       		if ($stmt->num_rows == 1){
           
	                if ($u_password == $password){
	                    // Password is correct!	                    
	                    return true;

	                } else {
	                    return false;
	                }

	            }else {            
	            	return false;//no hay ningún usuario con ese correo
	        	}	
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}

	}//Fin clase DaoLogin
?>