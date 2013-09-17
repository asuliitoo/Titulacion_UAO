<?php 
	
	include_once('Clases/classConstantes.php');

	$Conn = new Conexion();


	$universidad 	=$_POST["universidad"];
	$entidad 		=$_POST["entidad"];

	$id_entidad		=$_POST["id_entidad"];
	$c_institucion	=$_POST["c_institucion"];
	$LicMaster		=$_POST["LicMaster"];

	$rector 		=$_POST["rector"];
	$admin_escolar	=$_POST["admin_escolar"];
	$e_profesional 	=$_POST["e_profesional"];
	$l_certificacion=$_POST["l_certificacion"];
	$diaC 			=$_POST["diaC"];
	$mesC 			=$_POST["mesC"];
	$anioC 			=$_POST["anioC"];
	$l_titulacion 	=$_POST["l_titulacion"];
	$diaT 			=$_POST["diaT"];
	$mesT 			=$_POST["mesT"];
	$anioT			=$_POST["anioT"];

	$a = " a ";
	$de = " de ";


	$f_certificacion = $l_certificacion.$a.$diaC.$de.$mesC.$de.$anioC;
	$f_titulacion = $l_titulacion.$a.$diaT.$de.$mesT.$de.$anioT;

	$constantes = new Constantes($Conn);

	//$datos = $constantes->nuevasConstantes($universidad,$entidad,$rector,$admin_escolar,$e_profesional,$f_certificacion,$f_titulacion);
	$datos = $constantes->nuevasConstantes($universidad,$entidad,$id_entidad,$c_institucion,$LicMaster,$rector,$admin_escolar,$e_profesional,$f_certificacion,$f_titulacion);

	if($datos){
		ECHO "Datos cargados";
	}


/*
$universidad 	
$entidad 		
$rector 		
$admin_escolar	
$e_profesional 	
$f_certificacion 			
$f_titulacion 	
*/
?>