<html>
<head>
	<title> Datos Generales</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />

    <script type="text/javascript" src="./jQuery/jQuery.js"></script>
    <script type="text/javascript" src="./jQuery/scriptConstantes.js"></script>
</head>
<body>

	<form method="post">
		
			<label> Universidad</label> <br>
			<input type = "text" size="40" name="universidad" id="universidad" placeholder="Nombre de la Universidad">
			<br>

			<label> Entidad</label> <br>
			<input type = "text" size="40" name="entidad" id="entidad" placeholder="Entidad Federativa de la Univerisdad">
			<br>

			<label> Identificador de la Entidad</label> <br>
			<input  onkeypress='return justNumbers(event);' type = "text" size="2" name="id_entidad" id="id_entidad" placeholder="20" maxlength="2">
			<br>

			<label> Consecutivo de la institucion</label> <br>
			<input type = "text" size="4" name="c_institucion" id="c_institucion" placeholder="" maxlength="4">
			<br>

			<label> Código para Licenciatura y Maestría</label> <br>
			<input type = "text" size="4" name="LicMaster" id="LicMaster" placeholder="C1" maxlength="2">
			<br>

			<label> Rector de la Universidad</label> <br>
			<input type = "text" size="40" name="rector" id="rector" placeholder="Nombre del Rector">
			<br>

			<label> Administracion Escolar</label> <br>
			<input type = "text" size="40" name="admin_escolar" id="admin_escolar" placeholder="Nombre del Jefe del Departamento">
			<br>

			<label> Fecha de Examen Profesional</label> <br>
			<input type = "text" size="40" name="e_profesional" id="e_profesional" placeholder="Excencion">
			
			<br><label> Lugar de Certificacion</label> <br>
			<input type = "text" size="40" name="l_certificacion" id="l_certificacion">
			<br>
			<label> Fecha de Certificacion</label><br>
			<!-- -->
			<select name="dia" id="certificacion_dia">
				<?php
					for($d=1;$d<=31;$d++)
					{
						if($d<10)
							$dd = "0" . $d;
						else
							$dd = $d;
						echo "<option value='$dd'>$dd</option>";
					}
				?>
			</select>
			<select name="mes" id="certificacion_mes">
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

			<select name="anio" id="certificacion_anio">
				<?php
					$tope = date("Y");
					$edad_max = 1;
					$edad_min = 1;
					for($a= $tope - $edad_max; $a<=$tope + $edad_min; $a++)
						echo "<option value='$a' >$a</option>"; 
				?>
			</select>

			<!-- -->

			<br><label> Lugar de Expedicion de Titulo</label><br>
			<input type = "text" size="40"name="l_titulacion" id="l_titulacion">
			<br>
						<!-- -->
			<select name="dia" id ="titulacion_dia">
				<?php
					for($d=1;$d<=31;$d++)
					{
						if($d<10)
							$dd = "0" . $d;
						else
							$dd = $d;
						echo "<option value='$dd'>$dd</option>";
					}
				?>
			</select>
			<select name="mes" id ="titulacion_mes">
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

			<select name="anio" id ="titulacion_anio">
				<?php
					$tope = date("Y");
					$edad_max = 1;
					$edad_min = 1;
					for($a= $tope - $edad_max; $a<=$tope + $edad_min; $a++)
						echo "<option value='$a' >$a</option>"; 
				?>
			</select>

			<!-- -->
	
			<input type = "button" value ="Guardar" id="enviar">

	</form>

	<div id="aviso"></div>

</body>
<script type="text/javascript">
	function justNumbers(e) {
		var keynum = window.event ? window.event.keyCode : e.which;
		if ( keynum == 8 ) return true;
		return /\d/.test(String.fromCharCode(keynum));
	}
	</script>
</html>