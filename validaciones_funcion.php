<?php

	include_once("Clases/Validaciones.php");

	$Conn = new Conexion();

	$validaciones 	= $_POST["validaciones"];
	$alumno 		= $_POST["alumno"];

	//print_r($validaciones);
	//ECHO $alumno;

	$Validacion = new Validaciones($Conn);

	$v = $Validacion->agregarValidacion($validaciones,$alumno);
	//var_dump($v);

	if($v)
		ECHO "Alumno $alumno actualizado";
	else
		ECHO "$alumno No se pudo actualizar, intente otra vez";

?>