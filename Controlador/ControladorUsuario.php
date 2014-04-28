<?php
	require_once ('../Dao/DaoUsuario.php');
	require_once ('../Logico/Usuario.php');
	
	class ControladorUsuario{
		private $daoUsuario;
		
		public function __construct(){
			$this->daoUsuario = new DaoUsuario();		
		}
		
		public function insertarUsuario($usuario,$contrasena,$rol,$idEmpresa){
			$Usuario = new Usuario($usuario,$contrasena,$rol,$idEmpresa);			
			$this->daoUsuario->insertarUsuario($Usuario);
		}
	}
?>