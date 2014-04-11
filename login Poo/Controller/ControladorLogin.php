<?php

require '../Dao/DaoLogin.php';

	class ControladorLogin{

		private $correo;
		private $contrasenia;
		private $daoLogin;
		
		public function __construct($correo, $contrasenia){
			
			$this->correo = $correo;
			$this->contrasenia = $contrasenia;
			$this->daoLogin = new DaoLogin();	
			$this->verificarLogin();		
		}

		public function verificarLogin(){
			
			$resultado = $this->daoLogin->consultarDatos($this->correo,$this->contrasenia);

			if($resultado){

				echo "<script language='javascript'>window.location= '../View/Welcome.php'</script>";			

			}else{
				echo "Error ingresando al sistema. Por favor asegurese que este registrado en el sistema"; 
			}
		}

	}//Fin clase ControladorLogin
?>