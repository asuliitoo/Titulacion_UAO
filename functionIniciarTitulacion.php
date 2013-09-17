<?php

	include_once("Clases/classMover.php");

	$Conn = new Conexion();

	$titulacion = new Mover($Conn);
	/**
	*	@var 	valida  	boolean
	*/
	$valida = $titulacion->verificaValidaciones();

	if($valida){
		$nombres = $titulacion->copiaDatos();
		if($nombres){
				ECHO "Proceso de Titulacion Iniciado Correctamente";
		}
		else{
			ECHO "Error, no se pudo iniciar el proceso de Titulacion.";
		}
		//ECHO 
	}
	else{
		ECHO "No se pudieron procesar la validaciones, intentelo de nuevo";
	}


	
?>