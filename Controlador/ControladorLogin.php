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
			$this->verificarLogin();		
		}

		public function verificarLogin(){
			
			$resultado = $this->daoLogin->consultarDatos($this->usuario,$this->contrasenia);

			if($resultado){

				session_start();
				if($_SESSION['acceso'] == 1 && $_SESSION['rol'] == 'admin'){
					header('location: ../View/PanelAdminSistema.php');

				}elseif($_SESSION['acceso'] == 1 && $_SESSION['rol'] == 'adminEmpresa'){
					header('location: ../View/PanelAdminEmpresa.php');

				}elseif($_SESSION['acceso'] == 1 && $_SESSION['rol'] == 'cajero'){
					header('location: ../View/PanelCajero.php');
				}

			}else{
				echo "<h4>Por favor revise su usuario y contraseña</h4>";
			}
		}

	}//Fin clase ControladorLogin
?>
