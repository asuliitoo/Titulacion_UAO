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
	?>
	
	<form>
		<input type='hidden' name='tipo' value="1" >
		<br><label>Nombre de Usuario</label>
		<input type="text"     name="user" required		id="usuario">	 
		<div id="avisoUsuario"></div> 

		<br><label>Contraseña</label>
			<input type="password" name="pass" required		id="pass">	
		<div id="avisoPass"></div>   
		
		<br><label>Confirmar contraseña</label>
			<input type="password" name="pass2" required 	id="pass2"> 
		<div id="avisoPass2"></div>   

		<br><label>Rol</label>	
					<?php 
						$sql="SELECT * FROM rol";
						$result = $conexion->consulta($sql);

						ECHO "<select id='roles'>";
							ECHO "<option></option>";
							while($row=mysqli_fetch_array($result)){
								ECHO "<option name='rol' value='$row[nombre_rol]'>".$row['nombre_rol']."</option>";
							}				
						ECHO "</select>";
					?>								
		<div id="avisoRol"></div> 	
		<br><input type="button" value = "Registrar" id="enviar">


	</form>
<div id="aviso"></div>



</body>
</html>