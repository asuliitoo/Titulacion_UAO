<?php
	include 'conexion.php';
	
	/*
	* Se crea una nueva conexión
	*/
	$conn = new Conexion();

	/*
	* Bandera para determinar si un usuario ya existe.
	*/
	$existe = False;

	/*
	* cadena aleatoria para concatenar a la contraseña
	*/
	$str = "s.X098&+101";

	/*
	* Pasa a minusculas el nombre de usuario.
	*/
	$usuario = strtolower($_POST['usuario']);
	//ECHO "$usuario";
	
	/*
	* Consulta para verificar que el nuevo usuario no exista en la BD
	*/
	
	$Q_usuario = "SELECT nombre_usuario FROM usurio WHERE nombre_usuario = '$usuario' ";
	$result = $conn->conecta()->query($Q_usuario);

	/*
	* Si se encuentra algun elemento que coincida con el nuevo usuario
	* entonces el usuario ya existe.
	*/
	
	while ($row = $result->fetch_array(MYSQLI_NUM) ){	
		if($row[0]==$usuario){
			$existe = True;
			ECHO "El usuario ya existe";
		}
	}

		if (!$existe){

			/* 
			* Concatenacion de la contraseña y $str
			*/
			$new_pass = $_POST['pass'].$str;
			
			/*
			* Encriptación de la cadena
			*/
			$contra = md5($new_pass);
			/*
			* Consulta INSERT para agregar al nuevo usuario
			*/
			$consulta = "INSERT INTO usurio (nombre_usuario,password)
						 VALUES ('$usuario','$contra') ";

			/*
			* Ejecucion de la consulta
			*/
			$result = $conn->conecta()->query($consulta);
							
		}

				
?>
