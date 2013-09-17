<html>

<head>
	
	<title>Registro</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta name="language" content="es" />

	    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    	<script type="text/javascript" src="./jQuery/scriptRegistro.js"></script>

</head>
<body>

	<?php 
		include_once('Clases/Conexion.php');
		$conexion = new Conexion();

		$id = $_POST['id_usuario'];
		
		$sql = "SELECT * FROM usuario WHERE id_usurio = '$id' ";
		$result = $conexion->consulta($sql);

		$usuario = mysqli_fetch_array($result);
	?>
	
	<h1>¿Desea eliminar al usuario? </h1>

	<form>
		<input type="hidden"  id="id_usuario"  value="<?php ECHO "$id"; ?>">
		<br><label>Nombre de Usuario</label>
		<div><?php ECHO "$usuario[nombre_usuario]"; ?></div>


		<br><label>Rol</label>	
					<?php 
						$sql="SELECT * FROM rol";
						$result = $conexion->consulta($sql);

						$sql2 = "SELECT nombre_rol FROM rol WHERE id_rol = '$usuario[fk_rol]' ";
						$result2 = $conexion->consulta($sql2);
						$r = mysqli_fetch_array($result2);

						ECHO "<div>".$r['nombre_rol']."</div>";
					?>								
		<br><input type="button" value = "Eliminar" id="eliminar">


	</form>
<div id="aviso"></div>



</body>
</html>