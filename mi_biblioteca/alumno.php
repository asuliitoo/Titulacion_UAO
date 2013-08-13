<?php
	/*
	* Archivo de conexion a la Base de Datos
	*/
	include 'conexion.php';

	$conn = new Conexion();

	/*
	* Separa el nombre del archivo de la extension
	* y los almacena en un arreglo
	*/
	$temporal = explode(".", $_FILES["file"]["name"]);

	/**
	* @var obtiene la extension del array $temporal
	*/
	$extension = end($temporal);

	/*
	* Comprobar la extensión del archivo
	*/
	if ($extension == "csv"){

		/*
		* Se abre el archivo
		*/
		$file = fopen($_FILES['file']['tmp_name'],"r");
		
		while( ($data = fgetcsv($file,1000,",","\n"))!==false){
			//almacenar los campos en variables
			$programa		=$data[0];
			$descripcion	=$data[1];
			$id_alumno		=$data[2];	
			$nombre			=$data[3];
			$clase			=$data[4];
			$c_carrera		=$data[6];
			$c_inscritos	=$data[7];
			$c_ganados		=$data[8];
			$p_avance		=$data[9];
			$c_avance		=$data[10];

			/*
			*	limpiar_entrada: verifia que las variables estén codificadas en UTF-8
			*/
			$programa 		= $conn->limpiar_entrada( $programa ); 
			$descripcion 	= $conn->limpiar_entrada( $descripcion ); 
			$nombre 		= $conn->limpiar_entrada( $nombre ); 

			
			
			$p_avance = str_replace("%", "", $p_avance);


			$INSERT = "INSERT into alumno (
				programa,
				descripcion,
				id_alumno,
				nombre_alumno,
				clase_alumno,
				creditos_carrera,
				creditos_inscritos,
				creditos_ganados,
				porcentaje_avance,
				creditos_avance) 	
				VALUES(
					'$programa',
					'$descripcion',
					$id_alumno,
					'$nombre',
					$clase,
					$c_carrera,
					$c_inscritos,
					$c_ganados,
					$p_avance,
					$c_avance)";
	
			$conn->consulta( $INSERT );  
			//print_r($INSERT);
			//$result = $conn->conecta()->query($INSERT);
			/*ECHO "</br>$descripcion";
			ECHO "</br>$nombre";
			ECHO "</br>$c_avance";
			ECHO "</br>";*/
		}
		
		fclose($file);

	}
	else{

		ECHO "Ups!. Tipo de archivo no compatible";
	}
?>