<?php
  
 	require ('../Dao/DaoEmpresa.php');

    $daoEmpresa = new DaoEmpresa();
    $daoEmpresa->consultarEmpresas();
?>
