$(document).ready(function (){

	$('#nueva').click( function (){

		$('#window').addClass("visible");
		$('#fondo').addClass("fondo");
		$('#window').load('formBachillerato.html');

	});
});	

	function checkEdit(id){

		var id_bachillerato = id;

		 $.ajax({
	            type:'POST',
	            url: './formEditarBachillerato.php',
	            data:{	id_bachillerato: id_bachillerato}

	        }).done(function (mensaje){
	        	$('#window').addClass("visible");
				$('#fondo').addClass("fondo");
				$('#window').html(mensaje);

	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
	}

	function checkDelete(id){

		var id_bachillerato = id;

		 $.ajax({
	            type:'POST',
	            url: './formEliminarBachillerato.php',
	            data:{	id_bachillerato: id_bachillerato }

	        }).done(function (mensaje){
	        	$('#window').addClass("visible");
				$('#fondo').addClass("fondo");
				$('#window').html(mensaje);

	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });

	}

