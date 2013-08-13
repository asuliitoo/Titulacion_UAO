<?php

	include_once('Clases/Archivo.php');

	$Conn = new Conexion();

	/**
	* @param 	String 		$temporal		Directorio temporal del archivo.
	* @param 	String 		$archivo 		Archivo a ser manipulado.
	* @param 	String 		$directorio 	Nombre del directorio donde se almacena el archivo.
	* @param 	String 		$extension 		Extension del archivo.
	*/

	$temporal 	= $_FILES['file']['tmp_name'];
	$archivo 	= $_FILES['file']['name'];
	$directorio = "Archivos/";
	$extension 	= "csv";

	
	/**
	* @param 	Objeto 		$file 		Nueva instancia de la clase Archivo.
	*/
	$file = new Archivo($temporal,$archivo,$directorio,$extension);


	/**
	* @param 	boolean 	$load 		True si el archivo se cargo sin
	*/
	$upload  = $file->cargarArchivo();

	if($upload){
		$insert  = $file->insertarBD($Conn);	
		ECHO "El archivo $archivo ha sido cargado correctamente";

		//ECHO "<br>El archivo '$archivo' ha sido cargado correctamente";
	}
	

?>
<html>
<head>
	<title></title>
</head>
<body>



</body>
</html>