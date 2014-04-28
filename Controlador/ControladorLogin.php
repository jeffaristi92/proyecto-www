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
					header('Location: ../View/Welcome.php');
				}

			}else{
				echo "<script type'text/javascript' language'javascript'>
						alert('Por favor revise su usuario y contrasenia');
						location.href='../index2.php';
					</script>";
			}
		}

	}//Fin clase ControladorLogin
?>
