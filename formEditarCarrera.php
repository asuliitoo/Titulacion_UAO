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

	<h1><?php ECHO "$carrera[nombre_carrera]"; ?> </h1>
	<form method="post">
		
		<label> Carrera</label>
		<input type="hidden"  placeholder="<?php ECHO "$id"; ?>"  id="id_carrera"  		value="<?php ECHO "$carrera[id_carrera]"; ?>">
		<input type="text" size="80" name="carrera" id="carrera"  value="<?php ECHO "$carrera[nombre_carrera]"; ?>">		
		
		<label> Identificador de Area</label> 
		<input type = "text" size="2" name="area" 		 maxlength="1"  id="area"  		value="<?php ECHO "$carrera[i_area]"; ?>">
		

		<label> Identificador de Subarea</label> 
		<input type = "text" size="2" name="subArea" 	 maxlength="2"  id="subArea"  	value="<?php ECHO "$carrera[i_subArea]"; ?>">
		

		<label> Identificador de Nivel</label>
		<input type = "text" size="2" name="nivel" 		 maxlength="1"  id="nivel" 	  	value="<?php ECHO "$carrera[i_nivel]"; ?>">
		

		<label> Consecutivo</label>
		<input type = "text" size="2" name="consecutivo" maxlength="2"  id="consecutivo" value="<?php ECHO "$carrera[consecutivo]"; ?>">		

		<input type = "button" value ="Guardar Cambios" id="enviar">

	</form>

	<div id="aviso"></div>

</body>
</html>