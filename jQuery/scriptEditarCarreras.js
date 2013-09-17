$(document).ready(function (){

	$('#nueva').click( function (){

		$('#window').addClass("visible");
		$('#fondo').addClass("fondo");
		$('#window').load('formCarrera.html');

	});
});	

	function checkEdit(id){

		var id_carrera = id;

		 $.ajax({
	            type:'POST',
	            url: './formEditarCarrera.php',
	            data:{	id_carrera: id_carrera}

	        }).done(function (mensaje){
	        	$('#window').addClass("visible");
				$('#fondo').addClass("fondo");
				$('#window').html(mensaje);

	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
	}

	function checkDelete(id){

		var id_carrera = id;
		//alert("Carrera: " + id + "Tipo: " +  tipo);		
		 $.ajax({
	            type:'POST',
	            url: './formEliminarCarrera.php',
	            data:{	id_carrera: id_carrera }

	        }).done(function (mensaje){
	        	$('#window').addClass("visible");
				$('#fondo').addClass("fondo");
				$('#window').html(mensaje);

	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });

	}

