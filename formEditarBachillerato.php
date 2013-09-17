<html>
<head>
	<title> Editar Bachillerato</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

	<script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptEditaBachillerato.js"></script>
</head>
<body>

	<?php  
		include_once('Clases/Conexion.php');

		$Conn = new Conexion();

		$id = $_POST['id_bachillerato'];

		$sql = "SELECT * FROM preparatoria WHERE id_preparatoria = '$id' ";
		$result = $Conn->consulta($sql);

		$Bachillerato = mysqli_fetch_array($result);
	?>

	<h1><?php ECHO "$Bachillerato[nombre_preparatoria]"; ?> </h1>
	<form method="post">
		
		<label> Preparatoria</label>
		<input type="hidden"  placeholder="<?php ECHO "$id"; ?>"  id="id_preparatoria"  		value="<?php ECHO "$Bachillerato[id_preparatoria]"; ?>">
		<input type="text" size="80" name="preparatoria" id="preparatoria"  value="<?php ECHO "$Bachillerato[nombre_preparatoria]"; ?>">		
		
		<label> Entidad</label> 
		<input type = "text"  name="entidadPrepa" 	  id="entidadPreparatoria"  		value="<?php ECHO "$Bachillerato[entidad_preparatoria]"; ?>">
		
		<input type = "button" value ="Guardar Cambios" id="enviar">

	</form>

	<div id="aviso"></div>

</body>
</html>