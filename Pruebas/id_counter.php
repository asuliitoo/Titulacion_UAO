<html>
<head>
	<title> Checkbox</title>
	<script type="text/javascript" src="../jQuery/jQuery.js"></script>
</head>
<body>
	<?php

	$id=5;
	for($i=0; $i<5;$i++){
		ECHO '<p>
			<input type="checkbox" name="categoria[][]" value="0" />
			<input type="checkbox" name="categoria[][]" value="1" />
			<input type="checkbox" name="categoria[][]" value="2" />
			<input type="checkbox" name="categoria[][]" value="3" />
			<input type="button" id="enviar" value="enviar"/>
			</p>';
				
	}
	

	?>

</body>
<script type="text/javascript">

$(function() {
    $('#enviar').click(function() {
        var categorias = new Array();
 
        $("input[name='categoria[][]']:checked").each(function() {
            categorias.push($(this).val());
        });
 
        alert(categorias);
    });
});


</script>
</html>