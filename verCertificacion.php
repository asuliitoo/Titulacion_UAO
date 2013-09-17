<html>
<head>
	<title> Vista Previa - Titulacion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <link rel="stylesheet" type = "text/css" href="./bootstrap/css/bootstrap.css">
</head>
<body>
	<?php 

		include_once("Clases/Conexion.php");
		$conexion = new Conexion();
	 ?>

	<div style="overflow:scroll; ">
		<table class="table table-hover" style="width:auto;">
              <thead>
                <tr>
                  <th>CURP</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Nombre</th>
                  <th>Identificador del estado de la Institución</th>
                  <th>Consecutivo de la Institución</th>
                  <th>Identificador del área de la Carrera</th>
                  <th>Identificador de la sub área de la Carrera</th>
                  <th>Identificador del nivel de la Carrera</th>
                  <th>Consecutivo de la Carrera</th>
                  <th>Tipo de registro</th>
                  <th>Sexo</th>
                  <th>Entidad de Nacimiento</th>
                  <th>Fecha de Nacimiento</th>
                  <th>Fecha de examen profesional</th>
                  <th>País donde radica el profesionista</th>
                  <th>extra 1</th>
                  <th>extra 2</th>
                  <th></th>

                </tr>
              </thead>
              <tbody>

                	<?php  
              		$sql = "SELECT * FROM titulacion";
              		$result = $conexion->consulta($sql);

              		while($row = mysqli_fetch_array($result)){
              				$consulta = "SELECT * FROM profesionista WHERE fk_alumno = $row[fk_alumno]";
              				$res = $conexion->consulta($consulta);
              				$titulacion = mysqli_fetch_array($res);

              				$sql_carrera = "SELECT * FROM carrera WHERE nombre_carrera = '$row[carrera]'";
              				$result_carrera = $conexion->consulta($sql_carrera);
              				$carrera = mysqli_fetch_array($result_carrera);

              				$sql_constantes = "SELECT i_estado_institucion,consecutivo_institucion,codigo_LicMaster FROM constantes";
              				$result_constantes = $conexion->consulta($sql_constantes);
              				$constantes = mysqli_fetch_array($result_constantes);
              			ECHO "<tr>
              					<td > $row[curp]</td>
              					<td > $row[a_paterno]</td>
              					<td > $row[a_materno]</td>
              					<td > $row[nombre]</td>

              					<td > $constantes[i_estado_institucion]</td>
              					<td > $constantes[consecutivo_institucion]</td>

              					<td > $carrera[i_area]</td>
              					<td > $carrera[i_subArea]</td>
              					<td > $carrera[i_nivel]</td>              					
              					<td > $carrera[consecutivo]</td>

              					<td > $constantes[codigo_LicMaster]</td>
              					<td > $titulacion[sexo]</td>
              					<td > $titulacion[entidad_nacimiento]</td>
              					<td > $titulacion[fecha_nacimiento]</td>
              					<td > - </td>
              					<td > $titulacion[pais_radica]</td>
              					<td > - </td>
              					<td > - </td>
              				</tr>";
              		}
              		?>

                
              </tbody>
            </table>

	</div>
	


</body>
</html>