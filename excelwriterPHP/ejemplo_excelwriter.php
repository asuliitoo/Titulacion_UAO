<?php
	// Autor de este ejemplo:
	//   Oscar Hernandez Caballero
	//   Descargate este código desde http://www.parentesys.es/informatica
	
	include("excelwriter.inc.php");
	include_once ('../conexion.php');

	$conn = new Conexion ();

	$excel=new ExcelWriter("prueba_excelwriter.xls");
	
	if($excel==false) {	
		echo $excel->error;
	}

	// linea de cabecera
	$myArr=array("nombre","apellido","edad","telefono");
	$excel->writeLine($myArr);

	$user= "SELECT nombre_usuario FROM usurio WHERE id_usuario = 'admin'";
	$rol= "SELECT nombre_rol FROM rol WHERE id_rol=1";

	$r_user = new ExcelWriter($user);
	$r_rol = new ExcelWriter($rol);

	ECHO $r_user;

	// lineas de datos
	for ($ind=0; $ind<1000; $ind++) {
		$myArr=array($r_user.$ind,$r_rol.$ind);
		$excel->writeLine($myArr);
	}

	/* lineas de datos
	for ($ind=0; $ind<1000; $ind++) {
		$myArr=array("nombre".$ind,"apellido".$ind,"edad".$ind,"telefono".$ind);
		$excel->writeLine($myArr);
	}*/
	
	
	// otra forma de insertar una linea
	//$excel->writeRow();
	//$excel->writeCol("columna1");
	//$excel->writeCol("columna2");
	//$excel->writeCol("columna3");
	//$excel->writeCol("columna4");
	 
	$excel->close();
	echo "fin de la exportacion";
?>
