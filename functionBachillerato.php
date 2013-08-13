<?php 

	include_once('Clases/classBachillerato.php');

	$Conn = new Conexion();

	$bachillerato 	 = $_POST["bachillerato"];
	$entidad 		 = $_POST["entidad"];

	$preparatoria = new Bachillerato($Conn);
	$bach = $preparatoria->nuevoBachillerato($bachillerato, $entidad);
	
	if ($bach){
		ECHO "Bachillerato agregado correctamente";
	}
?>