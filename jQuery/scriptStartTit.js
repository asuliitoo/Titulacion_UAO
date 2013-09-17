$(document).ready(function () {
	
	$('#btn-titulacion').click( function (){
		$.ajax({
            type:'POST',
            url: './functionIniciarTitulacion.php'
        }).done(function (mensaje){
            $('#aviso').html(mensaje);
           }).fail(function (mensaje){
            $('#aviso').html("Algo salio mal");
           });

	});
});