<?php 

	include_once('Clases/classCarrera.php');

	$Conn = new Conexion();

	$carrera 	 = $_POST["carrera"];
	$area 		 = $_POST["area"];
	$subArea 	 = $_POST["subArea"];
	$nivel 		 = $_POST["nivel"];
	$consecutivo = $_POST["consecutivo"];

	$licenciatura = new Licenciatura($Conn);

	$lic = $licenciatura->nuevaLicenciatura($carrera, $area, $subArea, $nivel, $consecutivo);

	if ($lic)
		ECHO "Licenciatura agregada correctamente";

?>