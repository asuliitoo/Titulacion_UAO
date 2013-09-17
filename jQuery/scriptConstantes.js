$(document).ready(function(){

	$('#enviar').click(function() {

		var alerta = "";

		if ( $('#universidad').val()==""){ 
			alerta = alerta + ("-Parece que su Institución no tiene nombre\n");
		}
		if ( $('#entidad').val()==""){
			alerta = alerta + ("-Ingrese la Entidad de la Institución\n");
		}

		if ($('#id_entidad').val()==""){
			alerta = alerta + ("-Ingrese el ID de la Entidad de la Universidad\n");
		}

		if ( $('#c_institucion').val==""){
			alerta = alerta + ("-Ingrese el Consecutivo de la Universidad\n");
		}

		if ( $('#rector').val()==""){
			alerta = alerta + ("-Ingrese un nombre de Rector\n");
		}
		if ( $('#admin_escolar').val()==""){
			alerta = alerta + ("-Ingrese el nombre del Jefe de Departamento\n")
		}
		if ( $('#e_profesional').val()==""){
			alerta = alerta + ("-Ingrese el tipo de examen\n");
		}
		if ( $('#l_certificacion').val()==""){
			alerta = alerta + ("-Ingrese el lugar de Certificación\n");
		}

		//$("#certificacion_dia option:selected").val();
		
		if ( $('#l_titulacion').val()==""){
			alerta = alerta + ("-Ingrese el lugar de Titulación\n");
		}

		if(alerta == ""){

			universidad = $('#universidad').val();
	        entidad = $('#entidad').val();
	        id_entidad = $('#id_entidad').val();
	        c_institucion = $('#c_institucion').val();
	        LicMaster = $('#LicMaster').val();
	        rector 	= $('#rector').val();
	        admin_escolar = $('#admin_escolar').val();
	        e_profesional = $('#e_profesional').val();
	        l_certificacion = $('#l_certificacion').val();
	        diaC = $("#certificacion_dia option:selected").text();
	        mesC = $("#certificacion_mes option:selected").text();
	        anioC = $("#certificacion_anio option:selected").text();
	        l_titulacion = $('#l_titulacion').val();
	        diaT = $("#titulacion_dia option:selected").text();
	        mesT = $("#titulacion_mes option:selected").text();
	        anioT = $("#titulacion_anio option:selected").text();

	         $.ajax({
	            type:'POST',
	            url: './functionConstantes.php',
	            data:{
		            universidad 	:universidad,
					entidad 		:entidad,
					id_entidad		:id_entidad,
					c_institucion	:c_institucion,
					LicMaster		:LicMaster,
					rector 			:rector,
					admin_escolar	:admin_escolar,
					e_profesional 	:e_profesional,
					l_certificacion :l_certificacion,
					diaC 			:diaC,
					mesC 			:mesC,
					anioC 			:anioC,
					l_titulacion 	:l_titulacion,
					diaT 			:diaT,
					mesT 			:mesT,
					anioT 			:anioT 
	            }

	        }).done(function (mensaje){
	            $('#aviso').html(mensaje);
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });

		}

		else{
			alert(alerta);	
		}
			
	});
}); 			