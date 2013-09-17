<html>
<head>
	<title> Lista de Alumnos de Titulacion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="./jQuery/jQuery.js"></script>

    <style type="text/css">
    .visible{
    	background-color:orange; 
    	color: white;
    	position:absolute;
    	top:5%;
    	left:5%;
    	right:5%;
    	width:90%;
    	height: auto;
    	display:none;
    	z-index:+1;
    }

    .fondo{	 	
		position:absolute;
		top:0px;
		left:0px;
		width:100%;
		height:100%;
		background-color:black;
		/*IE*/
		filter: alpha(opacity=50);
		/*FireFox Opera*/
		opacity: .5;
    }
    </style>
</head>
<body>
	<?php 
		include_once('Clases/Conexion.php');
		$conexion = new Conexion();
	?>
	<div style="background:white">
		<table class="table table-hover table-condensed">
              <thead>
                <tr style = "font-weight: bold; background: black; color:white;">
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>CURP</th>
                  <th>Carrera</th>
                  <th>Periodo</th>
                  <th>Bachillerato</th>
                  <th>Periodo</th>
                  <th>Editar</th>
                </tr>
              </thead>


              <tbody>
              	<?php 
              		$sql="SELECT fk_alumno,nombre,curp,a_paterno,a_materno,carrera,periodo_carrera,nombre_bachillerato,periodo_bachillerato
              			FROM titulacion";
              		$result = $conexion->consulta($sql);
              		while ($row = mysqli_fetch_array($result)){
                    $alumno=$row['fk_alumno'];
                    $form="form";
                    $form = $form.$alumno;
                    
              			ECHO "<tr>
                  				<td>$alumno</td>
                  				<td>$row[nombre] $row[a_paterno] $row[a_materno]</td>
                  				<td>$row[curp]</td>
                  				<td>$row[carrera]</td>
                  				<td>$row[periodo_carrera]</td>
                  				<td>$row[nombre_bachillerato]</td>
                  				<td>$row[periodo_bachillerato]</td>
                  				<td>
                            <form action='formDatos.php' method='POST' name='$form'>
                              <input type='hidden' name='$alumno'>
                              <input type='submit' value='editar'>
                              </form></td>
                			</tr>";
              		}
              	?>
              </tbody>
            </table>

     </div>

     <div id="window" class="visible">
     </div>
     <div id="back"></div>
</body>
<script type="text/javascript">

</script>
</html>