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
	$usuario = strtolower($_POST['user']);
	//ECHO "$usuario";

	
	/*
	* Verificar que el campo de usuario no se encuentre vacío.	
	*/
	if($usuario == ''){
		ECHO "No se ha ingresado un nombre de usuario";
	}

	else {
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
				* Verificar que el campo "contraseña" no se encuentre vacío
				*/	
				if($_POST['pass']== ''){
					ECHO "No se ha ingresado una contrasenia";
				}
					/*
					* Verificar que el campo "contraseña 2" no se encuentre vacío
					*/
					else if($_POST['pass2']== ''){
						ECHO "No se ha confirmado la contrasenia";
					}
						/*
						* Verificar que las contraseñas coincidan
						*/
						else if ($_POST['pass'] != $_POST['pass2']){
							ECHO "Las contraseñas no coinciden\n";
						}

							else{
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
								$consulta = "INSERT INTO usurio (nombre_usuario,password,fk_rol)
											 VALUES ('$usuario','$contra','$_POST[Rol]') ";

								/*
								* Ejecucion de la consulta
								*/
								$result = $conn->conecta()->query($consulta);								
							}
			}
		}			
				//impresion de los datos obtenidos de la consulta
					/*while ($row = $result->fetch_array(MYSQLI_NUM) ){
						printf("\n%s (%s)", $row[0],$row[1] );
						ECHO "<br/>";
					}*/
					//printf("\n%s", $row[0]);
				//ECHO "<br/>";				
?>



