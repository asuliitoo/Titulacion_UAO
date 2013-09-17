$(document).ready(function(){
	$('#enviar').click(function() {

		id 		= $('#id_carrera').val();
		carrera = $('#carrera').val();
	    area 	= $('#area').val();
	    subArea = $('#subArea').val();
	    nivel 	= $('#nivel').val();
	    consecutivo= $('#consecutivo').val();
		
		// tipo 1 = editar;
	    var tipo = 1;

	    $.ajax({
	        type:'POST',
	        url: './carreras.php',
	        data:{
	        	tipo 	: tipo,
	        	id 		: id,
	            carrera : carrera ,
	            area 	: area,
	        	subArea : subArea,
	        	nivel 	: nivel,
	        	consecutivo: consecutivo
	        }

	        }).done(function (mensaje){
	            $('#aviso').html(mensaje);
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
					
	});

	
	$('#eliminar').click(function() {

		id 		= $('#id_carrera').val();
		// tipo 1 = editar;
	    var tipo = 2;

	    $.ajax({
	        type:'POST',
	        url: './carreras.php',
	        data:{
	        	tipo 	: tipo,
	        	id 		: id,
	        }

	        }).done(function (mensaje){
	            $('#aviso').html(mensaje);
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
					
	});
});