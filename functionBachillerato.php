<?php 

	include_once('Clases/classBachillerato.php');

	$Conn = new Conexion();

	$bachillerato 	 = $_POST["bachillerato"];
	$entidad 		 = $_POST["entidad"];

	$preparatoria = new Bachillerato($Conn);
	$prepa = $preparatoria->nuevoBachillerato($bachillerato, $entidad);
	

	ECHO $prepa;

?>