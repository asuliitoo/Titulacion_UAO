<?php 

	include_once("clases/classDatos.php");

	$Conn = new Conexion();

		$datos = new Datos($Conn);
		$ans = $datos->actualizarAlumno($_POST);

		if($ans)
			ECHO "Datos enviados";
		else
			ECHO "No se puedo enviar";
		//ECHO $ans;

 ?>