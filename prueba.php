<?php
	include 'logico/Empresa.php';
	
	$empresa = new Empresa(1,'hola','bnien','www.com','calle bn','00000');
	
	echo $empresa->getTitulo();
	echo $empresa->getLogo();
	echo $empresa->getUrl();
	echo $empresa->getDireccion();
	echo $empresa->getTelefono();
	echo $empresa->getIdEmpresa();
?>