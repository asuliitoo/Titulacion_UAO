<html>
<head>
	<title>Lista de Candidatos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type = "text/css" href="./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type = "text/css" href="./estilos/validaciones.css">

	<script type="text/javascript" src="./jQuery/jQuery.js"></script>
	<script type="text/javascript" src="./jQuery/scriptValidaciones.js"></script>

</head>
<body>
	
	<div class="table">

		<div class="table-title">
			<div class="table-ID">			ID			</div>
			<div class="table-campo">		Descripción	</div>
			<div class="table-campo">		Alumno		</div>
			<div class="table-checkbox">	Idiomas		</div>
			<div class="table-checkbox">	Firmas		</div>
			<div class="table-checkbox">	Servicio	</div>
			<div class="table-checkbox">	Pago		</div>
			<div class="table-btn">			Guardar		</div>
			<div class="table-progress">	Progreso	</div>
		</div>
		
			<?php

				include_once('Clases/Conexion.php');

				$Conn = new Conexion();

				//Consulta para obtener todos los datos de la tabla "alumno"
				$datos = "SELECT * FROM alumno";
				$alumno = $Conn->consulta($datos);

				$count = 1;
				

				while($row = mysqli_fetch_array($alumno)){
					$id_alumno     = $row['id_alumno'];
					$descripcion   = $row['descripcion'] ;
					$nombre_alumno = $row['nombre_alumno'];
					$list = "list";	
					$form = "form";
					$list = $list.$count;
					$form = $form.$count;
					$avance=0;
					// Consulta para obtener todas las validaciones de cada alumno
					$sql = "SELECT idiomas,documento_firmas, servicio_social,pago_titulacion FROM validaciones 
							WHERE fk_alumno = $id_alumno";
					$validaciones=$Conn->consulta($sql);

						$v = mysqli_fetch_array($validaciones);
				
				ECHO '
					<div class="table-row">
						<form name="'.$form.'" action="" method="post">
							<div class="table-ID"> 		'.$id_alumno.'		</div>
							<div class="table-campo"> 	'.$descripcion.'	</div>
							<div class="table-campo"> 	'.$nombre_alumno.'	</div>
							';
								if($v[0]=='1'){
									$avance=$avance+1;
									ECHO '<div class="table-checkbox"> <input type="checkbox" name="'.$list.'" value="idiomas"  checked>  		</div>';
								}
								else{
									ECHO '<div class="table-checkbox"> <input type="checkbox" name="'.$list.'" value="idiomas" >  				</div>';		
								}

								if($v[1]=='1'){
									$avance=$avance+1;
									ECHO '<div class="table-checkbox"> <input type="checkbox" name="'.$list.'" value="documento" checked>		</div>';
								}
								else{
									ECHO '<div class="table-checkbox"> <input type="checkbox" name="'.$list.'" value="documento">				</div>';		
								}

								if($v[2]=='1'){
									$avance=$avance+1;
									ECHO '<div class="table-checkbox"> <input type="checkbox" name="'.$list.'" value="servicio" checked>  		</div>';
								}
								else{
									ECHO '<div class="table-checkbox"> <input type="checkbox" name="'.$list.'" value="servicio">  				</div>';		
								}

								if($v[3]=='1'){
									$avance=$avance+1;
									ECHO '<div class="table-checkbox"> <input type="checkbox" name="'.$list.'" value="pago" checked>	 		</div>';
								}
								else{
									ECHO '<div class="table-checkbox"> <input type="checkbox" name="'.$list.'" value="pago">	 				</div>';		
								}

								$avance=$avance * 25;

							ECHO'
						
									<div class="table-btn"> 	 <input type="button" name="enviar" value="guardar" onClick="check(document.'.$form.'.'.$list.','.$id_alumno.')">		</div>
									<div class="table-progress"> <meter min="0" max="100" value='.$avance.'> </meter>	</div>
								</form>
							</div>
							
							';
			
				$count = $count + 1;		
				}
			?>	

	</div>
	<div id="aviso" style="position:relative; margin-top:45%; margin-left:3%; background-color:black; color:white; width:200px; text-align:center"><div>

</body>

</html>