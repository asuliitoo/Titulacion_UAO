<?php
	include 'conexion.php';

	$conn = new Conexion();

	$rolName= "SELECT u.nombre_usuario, r.nombre_rol FROM rol r, usurio u
	where r.id_rol = u.fk_rol";

	//$result2 = $conn->conecta()->query($rolName);
	$result2 = $conn->consulta($rolName);
	
	while ($row = $result2->fetch_array(MYSQLI_BOTH) ){
		printf("\nNombre Usuario:%s\n Nombre de Rol: %s.", $row[0], $row[1] );
		//ECHO $row;
		ECHO "<br/>";
	}
?>