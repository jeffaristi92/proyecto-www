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
				if($_SESSION['acceso'] == 1){
					header('Location: ../View/PanelAdminSistema.php');
				}

			}else{
				header('Content-Type: text/html; charset=UTF-8');//para que aparezan las tildes
				echo "<script type'text/javascript' language'javascript'>
						alert('Por favor revise su usuario y contraseña');
						location.href='../index.php';
					</script>";
			}
		}

	}//Fin clase ControladorLogin
?>
