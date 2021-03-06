<?php

require_once ('../DataBase/DataBase.php');

	class DaoLogin{

		private $conexionBd;

		public function __construct(){		

			$this->conexionBd = new DataBase();
		}

		public function consultarDatos($usuario, $password){			
			
			$conexion = $this->conexionBd->conectar();
			
			if ($stmt = $conexion->prepare("SELECT usuario, contrasena, rol, idEmpresa FROM Usuario WHERE usuario = ? LIMIT 1")){
	        
		        $stmt->bind_param('s', $usuario);  
		        $stmt->execute();   
		        $stmt->store_result();
			
	        	$stmt->bind_result($u_user, $u_password, $u_rol, $u_empresa);
	       		$stmt->fetch();			

	       		if ($stmt->num_rows == 1){
           
	                if ($u_password == $password){
	                    
	                    session_start();
	                    $_SESSION['acceso'] = 1;
						$_SESSION['usuario'] = $usuario;
						$_SESSION['empresa'] = $u_empresa;

	                    if($u_rol == 'admin'){
	                    	$_SESSION['rol'] = 'admin';
	                    	
	                    }elseif($u_rol == 'adminEmpresa'){

	                    	$_SESSION['rol'] = 'adminEmpresa';	                    	
	                    	
	                    }else{
	                    	$_SESSION['rol'] = 'cajero';
	                    }
	                    
	                    return true;

	                } else {
	                    return false;
	                }

	            }else {            
	            	return false;//no hay ningún usuario con ese nick
	        	}	
	        	
	        }//Fin consulta

			$this->conexionBd->desconectar($conexion);			
		}

	}//Fin clase DaoLogin
?>