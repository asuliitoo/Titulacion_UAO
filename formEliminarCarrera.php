<html>
<head>
	<title> Licenciatura</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

	<script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditaCarrera.js"></script>
</head>
<body>

	<?php  
		include_once('Clases/Conexion.php');

		$Conn = new Conexion();

		$id = $_POST['id_carrera'];

		$sql = "SELECT * FROM carrera WHERE id_carrera = '$id' ";
		$result = $Conn->consulta($sql);

		$carrera = mysqli_fetch_array($result);
	?>

	
	<h3> ¿Desea eliminar la Licenciatura? </h3>

	<form method="post">
		
		<label> Carrera</label>
		<input type="hidden"  placeholder="<?php ECHO "$id"; ?>"  id="id_carrera"  value="<?php ECHO "$carrera[id_carrera]"; ?>">
		<div><?php ECHO "$carrera[nombre_carrera]"; ?></div>
		
		<label> Identificador de Area</label> 
		<div><?php ECHO "$carrera[i_area]"; ?> </div>		

		<label> Identificador de Subarea</label> 
		<div><?php ECHO "$carrera[i_subArea]"; ?> </div>		

		<label> Identificador de Nivel</label>
		<div><?php ECHO "$carrera[i_nivel]"; ?></div>		

		<label> Consecutivo</label>
		<div> <?php ECHO "$carrera[consecutivo]"; ?></div>

		<input type = "button" value ="Eliminar" id="eliminar">

	</form>

	<div id="aviso"></div>

</body>
</html>