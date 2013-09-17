<?php

	include_once('Clases/Registro.php');

	$Conn = new Conexion();

	$user 		= $_POST["usuario"];
	$password 	= $_POST["password"];


		$Registro = new Registro($Conn);
		$existe = $Registro->buscaUsuario($user,$password);	
		
		if($existe){
			ECHO "<script language='Javascript'>
					location.href='./home.html';
				  </script>";

		}
		else
			ECHO "<p>Verifique su usuario y contraseña</p>";
	
?>
