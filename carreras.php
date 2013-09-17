<?php 
include_once('Clases/classCarrera.php');

	$Conn = new Conexion();
	//ECHO "$_POST[tipo]";
	//var_dump($_POST);

	$id 	= $_POST["id"];
	$Licenciatura = new Licenciatura($Conn);

	if($_POST['tipo'] == "1"){
		
		$carrera 	= $_POST["carrera"];
		$area 	= $_POST["area"];
		$subarea = $_POST["subArea"];
		$nivel	 = $_POST["nivel"];
		$consecutivo = $_POST["consecutivo"];

		if($Licenciatura){

			$carrera = $Licenciatura->actualizarLicenciatura($carrera,$area,$subarea,$nivel,$consecutivo,$id);

			if($carrera){
				ECHO "Carrera actualizada correctamente";
			}
			else{
				ECHO "Algo salio mal, intente otra vez";
			}
		}
	}

	if($_POST['tipo'] == "2"){

		$elimina = $Licenciatura->eliminarLicenciatura($id);

		if($elimina){
			ECHO "Carrera eliminada";
		}
		else{
			ECHO "No se pudo eliminar la carrera, intentelo otra vez";
		}
	}


?>