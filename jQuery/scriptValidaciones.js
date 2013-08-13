

function check(field,id){

	//		val 	Array  		Almacena los checkbox seleccionados,	
	val = [];

	//		flag 	Contador 	Sirve para determinar si se ha seleccionado al menos un checkbox.	
	flag = 0;

	//  Ciclo para saber qué checkbox ha sido habilitado
	for(i=0 ; i < field.length ; i++){
			
		if(field[i].checked==true){				
			val[i]=1;
			flag+=1;
		}
		else{
			val[i]=0;
		}
	}

	if(flag < 1)
		alert("No ha seleccionado algun elemento");


	else{
		var alumno = id;	
	
	 	$.ajax({
            type:'POST',
            url: './validaciones_funcion.php',
            data:{
               validaciones: val,
               alumno: id
            	}

           }).done(function (mensaje){
                $('#aviso').html(mensaje);
            }).fail(function (mensaje){
                 $('#aviso').html("Algo salio mal");
            });

	}
	
}