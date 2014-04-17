<?php
	require_once '../Dao/DaoUsuario.php';
	require_once  '../logico/Usuario.php';
	
	class ControladorUsuario{
		private $daoUsuario;
		
		public function __construct(){
			$this->daoUsuario = new DaoUsuario();		
		}
		
		public function insertarUsuario($usuario,$contrasena,$rol,$idEmpresa){
			$Usuario = new Usuario($usuario,$contrasena,$rol,$idEmpresa);
			//echo $this->empresa->getTitulo();
			$this->daoUsuario->insertarUsuario($Usuario);
		}
	}
?>