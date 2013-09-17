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
                  <th>#</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Título</th>
                  <th>Nombre del Rector</th>
                  <th>Campus y Fecha de Expedición de títutlo</th>
                  <th>Libro</th>
                  <th>Foja</th>
                  <th>CURP</th>
                  <th>Estudios de Bachillerato</th>
                  <th>Periodo</th>
                  <th>Entidad Federativa</th>
                  <th>Institución</th>
                  <th>Carrera</th>
                  <th>Periodo</th>
                  <th>Entidad Federativa</th>
                  <th>Fecha de Examen</th>
                  <th>Lugar y fecha de la Certificación</th>
                  <th>Administración Escolar</th>

                </tr>
              </thead>
              <tbody>

                	<?php  
              		$sql = "SELECT * FROM titulacion";
              		$result = $conexion->consulta($sql);

              		while($row = mysqli_fetch_array($result)){
              			$nombre = $row['nombre']." ".$row['a_paterno']." ".$row['a_materno'];
              			ECHO "<tr>
              					<td > $row[no_progresivo]</td>
              					<td > $row[tipo_titulacion]</td>
              					<td > $nombre</td>
              					<td > $row[titulo]</td>
              					<td > $row[nombre_rector]</td>
              					<td > $row[exp_titulo]</td>
              					<td > $row[libro]</td>
              					<td > $row[foja]</td>
              					<td > $row[curp]</td>
              					<td > $row[nombre_bachillerato]</td>
              					<td > $row[periodo_bachillerato]</td>
              					<td > $row[entidad_bachillerato]</td>
              					<td > $row[institucion]</td>
              					<td > $row[carrera]</td>
              					<td > $row[periodo_carrera]</td>
              					<td > $row[entidad_institucion]</td>
              					<td > $row[examen_profesional]</td>
              					<td > $row[certificacion]</td>
              					<td > $row[administracion_escolar]</td>
              				</tr>";
              		}
              		?>

                
              </tbody>
            </table>

	</div>
	


</body>
</html>