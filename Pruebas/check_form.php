<html>
<head>
	<title> Validaciones</title>
	<script type="text/javascript" src="../jQuery/jQuery.js"></script>
</head>

<body>

<?php 
	$count = 0;
	while($count < 5){
		
		$list = "list";	
		$form = "form";
		$list = $list.$count;
		$form = $form.$count;
		ECHO "<br>".$list;
		ECHO "<br>".$form;

			ECHO '
				<form name="'.$form.'" action="" method="post">
					<input type="checkbox" name="'.$list.'" value="servicio"> Servicio 
					<input type="checkbox" name="'.$list.'" value="documento">Documento
					<input type="checkbox" name="'.$list.'" value="idiomas"> Idiomas 
					<input type="checkbox" name="'.$list.'" value="pago">	Pago 
					<input type="button" name="enviar" value="guardar" onClick="check(document.'.$form.'.'.$list.','.$count.')">
				</form>
			';

	$count = $count + 1;
	}
?>
						
</body>

<script type="text/javascript">
	
	function check(field,id){

		for(i=0;i<field.length;i++){
		
			if(field[i].checked==true){
				
				alert("alumno:" + id + " " + field[i].value);
			}
		}	
	}

</script>

</html>