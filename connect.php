<?php

	
	$con = mysqli_connect("localhost","root","","stitulacion");

	if(mysqli_connect_errno($con)){

		echo "Error al conectar a la base de datos" . mysqli_connect_error();
	}
	else
		echo "conexion exitosa";


?>