$(document).ready(function (){

	$('#nueva').click( function (){
		$('#window').addClass("visible");
		$('#fondo').addClass("fondo");
		$('#window').load('registro.php');
	});
});	

	function checkEdit(id){

		var id_usuario = id;
		//tipo 2: editar
		var tipo = 2;
		
		 $.ajax({
	            type:'POST',
	            url: './formEditarUsuario.php',
	            data:{	id_usuario: id_usuario,
	            			  tipo: tipo
	            		}

	        }).done(function (mensaje){
	        	$('#window').addClass("visible");
				$('#fondo').addClass("fondo");
				$('#window').html(mensaje);

	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });
	}

	function checkDelete(id){

		var id_usuario = id;
		//alert("Carrera: " + id + "Tipo: " +  tipo);		
		 $.ajax({
	            type:'POST',
	            url: './formEliminarUsuario.php',
	            data:{	id_usuario: id_usuario }

	        }).done(function (mensaje){
	        	$('#window').addClass("visible");
				$('#fondo').addClass("fondo");
				$('#window').html(mensaje);

	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });

	}

