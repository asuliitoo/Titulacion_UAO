<?php

	include 'conexion.php';

	//Se crea una nueva conexión
	$conn = new Conexion();

	//cadena aleatoria para concatenar a la contraseña
	$str = "s.X098&+101";

	//Pasa a minusculas el nombre de usuario.
	$usuario = strtolower($_POST['user']);
	
	// Concatenacion de la contraseña y $str
	$new_pass = $_POST['pass'].$str;
		
	//Encriptación de la cadena
	$contra = md5($new_pass);

	$existe = "SELECT nombre_usuario, password FROM usurio WHERE nombre_usuario = '$usuario' AND password = '$contra'";
	$existe = $conn->consulta($existe);

	if(!$existe){
		ECHO "Acceso Denegado";
	}
	else{
		ECHO "Acceso";
	}

?>