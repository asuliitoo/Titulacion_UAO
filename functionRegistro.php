<?php
	
	include_once('Clases/Registro.php');
	
	/*
	* Se crea una nueva conexión
	*/
	$conexion = new Conexion();

	/*
	*Se crea el objeto para crear Usuarios
	*/
	$Registro = new Registro($conexion);

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
	
	
	$tipo = $_POST['tipo'];

		if($tipo == '1'){
			$usuario = strtolower($_POST['usuario']);
			$password = $_POST['pass'];	
			$rol = $_POST['rol'];

			$U = $Registro->crearUsuario($usuario,$password,$rol);
			ECHO $U;	
		}		

		if($tipo == '2'){
			$usuario = strtolower($_POST['usuario']);
			$password = $_POST['pass'];	
			$rol = $_POST['rol'];
			$id = $_POST['id'];

			$U = $Registro->actualizarUsuario($usuario,$password,$rol,$id);
			ECHO $U;
		}

		if($tipo == '3'){
			$id = $_POST['id'];

			$U = $Registro->eliminarUsuario($id);
			ECHO $U;
		}

	?>
