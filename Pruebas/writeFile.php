<?php 

	include_once('../Clases/Conexion.php');

	$conexion = new Conexion();	

	$file = fopen("C:\Graffer.csv",'w');

	$query="SELECT nombre_alumno FROM alumno";
	$result = $conexion->consulta($query);
		 
	while ($alumno=mysqli_fetch_array($result)){
		//ECHO "<br>".$alumno['nombre_alumno'];
		
		//ECHO $n."<br>";
		//var_dump($file,$alumno['nombre_alumno']);
		fputcsv($file,$n);
	}
	fclose($file);

 ?>