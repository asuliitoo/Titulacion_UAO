<?php
	include 'conexion.php';

	/*
	* Se crea una nueva conexión
	*/
	$conn = new Conexion();

	/*
	* cadena aleatoria para concatenar a la contraseña
	*/
	$str = "s.X098&+101";

	/*
	* Bandera para determinar si la contraseña coincide
	*/
	$pass_existe = False;

	/*
	* Bandera para determinar si el usuario concide
	*/

	$usuario_existe = False;

	/*
	* Pasa a minusculas el nombre de usuario.
	*/
	$usuario = strtolower($_POST['user']);

	/* 
	*Concatenacion de la contraseña y $str
	*/
	$new_pass = $_POST['pass'].$str;
	
	/*
	* Encriptación de la cadena
	*/
	$contra = md5($new_pass);

	$Q_pass="SELECT password FROM usurio WHERE password = '$contra' ";
	$result = $conn->conecta()->query($Q_pass);

	while ($row = $result->fetch_array(MYSQLI_NUM) ){	
			if($row[0]==$contra){
				$pass_existe = True;
				//ECHO "La contraseña coincide";
			}
	}
	
	$Q_usuario="SELECT nombre_usuario FROM usurio WHERE nombre_usuario = '$usuario' ";
	$result = $conn->conecta()->query($Q_usuario);

	while ($row = $result->fetch_array(MYSQLI_NUM) ){	
			if($row[0]==$usuario){
				$usuario_existe = True;
				//ECHO "El usuario coincide";				
			}
	}


	if($usuario_existe == True and $pass_existe == True){

		ECHO "ACCESO";
	}

	else{
		ECHO "ACCESO DENEGADO";
	}

?>