<html>
<head>
	<title> Eliminar Bachillerato</title>
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


	<h3> ¿Desea eliminar el Bachillerato? </h3>
	<form method="post">
		
		<label> Preparatoria</label>
		<input type="hidden"  placeholder="<?php ECHO "$id"; ?>"  id="id_preparatoria"  		value="<?php ECHO "$Bachillerato[id_preparatoria]"; ?>">
		<div><?php ECHO "$Bachillerato[nombre_preparatoria]"; ?></div>
		
		<label> Entidad</label> 
		<div> <?php ECHO "$Bachillerato[entidad_preparatoria]"; ?> </div>
		
		<input type = "button" value ="Eliminar" id="eliminar">

	</form>

	<div id="aviso"></div>

</body>
</html>