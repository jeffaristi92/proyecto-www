<?php

require_once ('../Dao/DaoLogin.php');

	class ControladorLogin{

		private $usuario;
		private $contrasenia;
		private $daoLogin;
		
		public function __construct($usuario, $contrasenia){
			
			$this->usuario = $usuario;
			$this->contrasenia = $contrasenia;
			$this->daoLogin = new DaoLogin();	
		}

		public function verificarLogin(){
			
			$resultado = $this->daoLogin->consultarDatos($this->usuario,$this->contrasenia);

			if($resultado){

				
				if($_SESSION['acceso'] == 1 && $_SESSION['rol'] == 'admin'){
					
					return "admin";

				}elseif($_SESSION['acceso'] == 1 && $_SESSION['rol'] == 'adminEmpresa'){
						
					return "adminEmpresa";

				}elseif($_SESSION['acceso'] == 1 && $_SESSION['rol'] == 'cajero'){
						
					return "cajero";
				}

			}else{
				echo "<h5 class='mensaje'>Por favor revise su usuario y contraseña</h5>";
			}
		}

	}//Fin clase ControladorLogin
?>
