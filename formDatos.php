<html>
<head>
	<title> Alumno</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptDatos.js"></script>
</head>
<body>
	<?php 
		include_once('Clases/Conexion.php');
		$conexion = new Conexion();
	?>
	<h1>
		<?php 
			$array = array_keys($_POST);
			$alumno= $array['0'];
			ECHO "<div id='Alumno'>$alumno</div>";

			$sql="SELECT nombre, a_paterno, a_materno FROM titulacion WHERE fk_alumno='$alumno'";			
			$result=$conexion->consulta($sql);

			while ($row=mysqli_fetch_array($result)){
				ECHO "$row[nombre] $row[a_paterno] $row[a_materno]";
			}	
		 ?>
	</h1>

<p>	<a href="./home.html"> Regresar</a> </p>

	<form>
		<div ><fieldset><legend> Información Personal</legend>
			<input type="text" placeholder="Nombre(s)" name="nombre" id="name">
			<input type="text" placeholder="Apellido Paterno" name="paterno" id="paterno">
			<input type="text" placeholder="Apellido Materno" name="materno" id="materno">
			<br><input type="text" placeholder="CURP" name="curp" id="curp" maxlength='18'>


			<br><label>Entidad de Nacimiento</label>		
				<?php 
					$sql="SELECT estado,numero FROM estado";
					$result = $conexion->consulta($sql);

					ECHO "<select id='entidad'>";
						ECHO "<option>Estado</option>";
						while($row=mysqli_fetch_array($result)){
							ECHO "<option name='entidad' value='$row[numero]'>".$row['estado']."</option>";
						}				
					ECHO "</select>";
				?>
			
			<input type="text" onkeypress='return justNumbers(event);' placeholder="Código del país, 003" name="p_radica" id="p_radica" maxlength="3">

			<br><label>Fecha de Nacimiento</label>
			<div><select name="dia" id="nacimiento_dia">
				<?php
					for($d=1;$d<=31;$d++){
						if($d<10)
							$dd = "0" . $d;
							else
								$dd = $d;
							echo "<option value='$dd'>$dd</option>";
						}
					?>
				</select>
				<select name="mes" id="nacimiento_mes">

				<?php
					for($m = 1; $m<=12; $m++)
					{
						if($m<10)
							$me = "0" . $m;
						else
							$me = $m;
						switch($me)
						{
							case "01": $mes = "Enero"; break;
							case "02": $mes = "Febrero"; break;
							case "03": $mes = "Marzo"; break;
							case "04": $mes = "Abril"; break;
							case "05": $mes = "Mayo"; break;
							case "06": $mes = "Junio"; break;
							case "07": $mes = "Julio"; break;
							case "08": $mes = "Agosto"; break;
							case "09": $mes = "Septiembre"; break;
							case "10": $mes = "Octubre"; break;
							case "11": $mes = "Noviembre"; break;
							case "12": $mes = "Diciembre"; break;			
						}
						echo "<option value='$me'>$mes</option>";
					}
				?>
				</select> 
				<select name="anio" id="nacimiento_anio">
					<?php
						$tope = date("Y");
						$edad_max = 45;
						$edad_min = 18;
						for($a= $tope - $edad_max; $a<=$tope - $edad_min; $a++)
							echo "<option value='$a'>$a</option>"; 
					?>
				</select></div>
			<!-- Termina desplegable  de Fechas-->

			<label>Sexo</label>
		<br><input type="radio" id="h" onclick="verificaSexo(1)">Hombre
		<input type="radio" id="m" onclick="verificaSexo(2)">Mujer
		</fieldset>
		</div>

	<div><fieldset><legend>Bachillerato</legend>
		<br><label>Preparatoria</label>		
		<?php 
			$sql="SELECT nombre_preparatoria,entidad_preparatoria FROM Preparatoria";
			$result = $conexion->consulta($sql);

			ECHO "<input list='prepas' name='prepas' id='prepaInput'>";
			
			ECHO "<datalist id='prepas'>";
				while($row=mysqli_fetch_array($result)){
					ECHO "<option name='prepa' value='$row[nombre_preparatoria]".","."$row[entidad_preparatoria]'>".$row['nombre_preparatoria']." , "."$row[entidad_preparatoria]"."</option>";
				}				
			ECHO "</datalist>";
		?>
		<br>
		<label>Año de Inicio</label>		
		<input onkeypress='return justNumbers(event);' id='prepaI' name='prepaI' size='4' maxlength="4">
		<br><label>Año de Termino</label>
		<input onkeypress='return justNumbers(event);' id='prepaF' name='prepaF' size='4' maxlength="4">
		</fieldset>
	</div>

	<div><fieldset><legend>Titulacion</legend>
		<br><label>Licenciado en</label>		
		<?php 
			$sql="SELECT nombre_carrera FROM carrera";
			$result = $conexion->consulta($sql);

			ECHO "<select id='carreras'>";
				ECHO "<option>Licenciatura</option>";
				while($row=mysqli_fetch_array($result)){
					ECHO "<option name='carrera' value='$row[nombre_carrera]'>".$row['nombre_carrera']."</option>";
				}
			ECHO "</select>";
		?>
		<br>
		<label>Año de Inicio</label>		
		<input onkeypress='return justNumbers(event);' id='carreraI' name='carreraI' size='4' maxlength="4">
		<br><label>Año de Termino</label>
		<input onkeypress='return justNumbers(event);' id='carreraF' name='carreraF' size='4' maxlength="4">

		<br><label>Tipo de Titulacion</label>
		<br><input type="radio" id="uno" onclick="verificaCheckbox(1)">Normal
		<br><input type="radio" id="dos" onclick="verificaCheckbox(2)">Mencion Honorífica
		</fieldset>
	</div>

	<div><fieldset><legend>Control</legend>
		<input onkeypress='return justNumbers(event);' type="text" placeholder="Foja" id="foja" name="foja" size="4" maxlength="3"> 
		<input onkeypress='return justNumbers(event);' type="text" placeholder="Libro" id="libro" name="libro" size="4" maxlength="3">
	</fieldset> </div>

	<div><fieldset><legend>Información General</legend>
		
		<?php 
		ECHO "<br><label>Institución: </label>";
			$sql="SELECT institucion FROM constantes";
			$result=$conexion->consulta($sql);
			$dato=mysqli_fetch_array($result);
			ECHO "<div>$dato[0]</div>";

		ECHO "<br><label>Entidad</label>";
			$sql="SELECT entidad_institucion FROM constantes";
			$result=$conexion->consulta($sql);
			$dato=mysqli_fetch_array($result);
			ECHO "<div>$dato[0]</div>";

		ECHO "<br><label>Rector de la Universidad</label>";
			$sql="SELECT nombre_rector FROM constantes";
			$result=$conexion->consulta($sql);
			$dato=mysqli_fetch_array($result);
			ECHO "<div>$dato[0]</div>";

		ECHO "<br><label>Examen Profesional</label>";
			$sql="SELECT ex_profesional FROM constantes";
			$result=$conexion->consulta($sql);
			$dato=mysqli_fetch_array($result);
			ECHO "<div>$dato[0]</div>";

		ECHO "<br><label>Administración Escolar</label>";
			$sql="SELECT admin_escolar FROM constantes";
			$result=$conexion->consulta($sql);
			$dato=mysqli_fetch_array($result);
			ECHO "<div>$dato[0]</div>";

		ECHO '<input type="button" id="activar" value="habilitar campos">';

		ECHO "<br><label>Lugar y Fecha de Certificación</label>";
			$sql="SELECT exp_certificado FROM constantes";
			$result=$conexion->consulta($sql);
			$dato=mysqli_fetch_array($result);
			ECHO "<br><input type='text' value='$dato[0]' id='certificacion' name='certificacion' size='55' disabled>";

		ECHO "<br><label>Campus y Fecha de Expedición de Título</label>";
			$sql="SELECT exp_titulo FROM constantes";
			$result=$conexion->consulta($sql);
			$dato=mysqli_fetch_array($result);
			ECHO "<br><input type='text' value='$dato[0]' id='titulacion' name='titulacion' size='55' disabled>";	
		?>

	</fieldset> </div>

		<input type="button" value="Guardar" id="enviar">
	</form>
	<div id="aviso"></div>

</body>
<script type="text/javascript">
	function justNumbers(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		if ( keynum == 8 ) return true;
		return /\d/.test(String.fromCharCode(keynum));
	}

	function verificaCheckbox(box){
		var uno=document.getElementById("uno");		
		var dos=document.getElementById("dos");

		if ( uno.checked==true && box=="1"){
			 dos.checked=false;
		}
		if ( dos.checked==true && box=="2"){
			uno.checked=false;
		}
	}

	function verificaSexo(s){

		var hombre=document.getElementById("h");		
		var mujer=document.getElementById("m");

		if ( hombre.checked==true && s=="1"){
			 mujer.checked=false;
		}
		if ( mujer.checked==true && s=="2"){
			hombre.checked=false;
		}
	}



</script>
</html>