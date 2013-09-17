$(document).ready(function(){
	$('#enviar').click(function() {

		id 		= $('#id_preparatoria').val();
		prepa 		= $('#preparatoria').val();
		entidadPrepa = $('#entidadPreparatoria').val();
		
		// tipo 1 = editar;
	    var tipo = 1;

	    $.ajax({
	        type:'POST',
	        url: './bachilleratos.php',
	        data:{
	        	tipo 	: tipo,
				id 		: id,
	        	prepa 	: prepa,	        	
	            entidadPrepa : entidadPrepa
	        }

	        }).done(function (mensaje){
	            $('#aviso').html(mensaje);
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
					
	});

	
	$('#eliminar').click(function() {

		id 		= $('#id_preparatoria').val();
		// tipo 1 = editar;
	    var tipo = 2;

	    $.ajax({
	        type:'POST',
	        url: './bachilleratos.php',
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
