
$(document).ready(function (){

	var activados ='0';

	$("#activar").click(function (){
			$("#certificacion").removeAttr('disabled');
			$("#titulacion").removeAttr('disabled');			
			activados = '1';
	});

	$('#enviar').click(function(){

		var alerta = "";

		var fk = $("#Alumno").text();
		var alumno = $("input[name=nombre]").val();
		var paterno = $("input[name=paterno]").val();
		var materno = $("input[name=materno]").val();

		var e_nacimiento = $("#entidad option:selected").val();
		var p_radica = $("input[name=p_radica]").val();

		var anioN = $("#nacimiento_anio option:selected").val();
	    var mesN = $("#nacimiento_mes option:selected").val();
	    var	diaN = $("#nacimiento_dia option:selected").val();
	    var fecha_nac = anioN + mesN + diaN;

	    sexo = "0";
	    if ( $('#h:checked').val()=="on"){
			sexo = "1";
		}

		if ( $('#m:checked').val()=="on"){
			sexo = "2";
		}

		var curp = $("input[name=curp]").val();
		var prepa = $("#prepas option:selected").text();
		var prepaI = $("input[name=prepaI]").val();
		var prepaF = $("input[name=prepaF]").val();
		var periodoPrepa = prepaI+"-"+prepaF;

		var carrera = $("#carreras option:selected").val();
		var carreraI = $("input[name=carreraI]").val();
		var carreraF = $("input[name=carreraF]").val();
		var periodoCarrera = carreraI+"-"+carreraF;

		var tipo = "0";
		if ( $('#uno:checked').val()=="on"){
			tipo = "1";
		}

		if ( $('#dos:checked').val()=="on"){
			tipo = "2";
		}

		var foja = $("input[name=foja]").val();
		var libro = $("input[name=libro]").val();

		var certificacion=$("input[name=certificacion]").val();
		var titulacion=$("input[name=titulacion]").val();

		/**
		* Mensajes de Alertas
		*/
		if (alumno ==""){
			alerta = alerta + ("-Nombre\n");
		}
		if (paterno ==""){
			alerta = alerta + ("-Apellido Paterno\n");
		}
		if (materno ==""){
			alerta = alerta + ("-Apellido Materno\n");
		}
		if (curp ==""){
			alerta = alerta + ("-CURP\n");
		}

		if(e_nacimiento == "Estado"){
			alerta = alerta + ("-Estado/Entidad\n");
		}

		if(p_radica == ""){
			alerta = alerta + ("-Código de País\n");
		}		

		if (prepa =="Preparatoria"){
			alerta = alerta + ("-Bachillerato\n");
		}
		if (prepaI ==""){
			alerta = alerta + ("-Año de Inicio del Bachillerato\n");
		}
		if (prepaF ==""){
			alerta = alerta + ("-Año de Termino del Bachillerato\n");
		}

		if (carrera =="Licenciatura"){
			alerta = alerta + ("-Carrera\n");
		}
		if (carreraI ==""){
			alerta = alerta + ("-Año de Inicio de la Carrera\n");
		}
		if (carreraF ==""){
			alerta = alerta + ("-Año de Termino de la Carrera\n");
		}
		
		if(tipo=="0"){
			alerta = alerta + ("-Tipo de Titulación\n");
		}

		if(sexo=="0"){
			alerta = alerta + ("-Sexo\n");
		}

		if (foja ==""){
			alerta = alerta + ("-Foja\n");
		}

		if (libro ==""){
			alerta = alerta + ("-Libro\n");
		}

		if (activados == '1'){
			if(certificacion==""){
				alerta = alerta + ("-Lugar y Fecha de Certifiación\n");
			}
		
			if(titulacion==""){
				alerta = alerta + ("-Campus y Fecha de Titulación\n");
			}
		}

		if(alerta==""){
			 $.ajax({
	            type:'POST',
	            url: './functionDatos.php',
	            data:{
					fk  			: fk,
					alumno  		: alumno  ,
					paterno 		: paterno ,
					materno 		: materno ,
					curp  			: curp  ,
					e_nacimiento	: e_nacimiento,
					p_radica		: p_radica,
					fecha_nac		: fecha_nac,
					sexo 			: sexo,
					prepa 			: prepa ,
					periodoPrepa	: periodoPrepa,
					carrera  		: carrera  ,
					periodoCarrera	: periodoCarrera,
					tipo			: tipo,
					foja 			: foja ,
					libro 			: libro ,
					certificacion	: certificacion,
					titulacion		: titulacion
	            }

	        }).done(function (mensaje){
	            $('#aviso').html(mensaje);
	        }).fail(function (mensaje){
	            $('#aviso').html("Algo salio mal");
	        });

		}else{
			alert("Por favor llene los siguientes campos:\n"+alerta);
		}



		
	});	
});
