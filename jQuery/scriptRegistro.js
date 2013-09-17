$(document).ready(function () {

	var msjRol = "Seleccione un Rol para el usuario";
	var msjPass = "Las contraseñas no coinciden";
	var msjObligatorio = "Campo obligatorio";
	var msjReset = "";


	$('#enviar').click(function (){
		
		$('#avisoUsuario').html(msjReset);
		$('#avisoPass').html(msjReset);
		$('#avisoPass2').html(msjReset);
		$('#avisoRol').html(msjReset);
		$('#aviso').html(msjReset);

		var usuario	= $("input[name=user]").val();
		var pass = $("input[name=pass]").val();
		var pass2 = $("input[name=pass2]").val();
		var rol = $("#roles option:selected").val();

		var tipo = $("input[name=tipo]").val();
		var id = $("input[name=id_usuario]").val();
		
		var pasa = '0';
		var checaPass = '0';

		if (usuario=="" || usuario == " "){
			$('#avisoUsuario').html(msjObligatorio);
			pasa = pasa + ('1');
		}		

		if (rol==""){
			$('#avisoRol').html(msjRol);
			pasa = pasa + ('1');
		}
		
		if (pass=="" || pass==" "){
			$('#avisoPass').html(msjObligatorio);
			pasa = pasa + ('1');
			checaPass = checaPass + ('1');
		}
		
		if (pass2=="" || pass2==" "){
			$('#avisoPass2').html(msjObligatorio);
			pasa = pasa + ('1');
			checaPass = checaPass + ('1')
		}
		
		if (checaPass == '0'){
			if (pass != pass2 ){
				$('#aviso').html(msjPass);
				pasa = pasa + ('1');
			}
		}

		if(pasa == '0'){
			$.ajax({
				            type:'POST',
				            url: './functionRegistro.php',
				            data:{	
				            	tipo: tipo,
				            	  id: id,
				             	usuario:usuario,	
							 	pass:pass, 
							 	rol:rol  }
				        }).done(function (mensaje){
							$('#aviso').html(mensaje);

				        }).fail(function (mensaje){
				            $('#aviso').html("Algo salio mal");
				        });

		}
		


	});

	$('#eliminar').click(function() {

			id 		= $('#id_usuario').val();
			// tipo 3 = borrar;
		    var tipo = 3;

		    $.ajax({
		        type:'POST',
		        url: './functionRegistro.php',
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
