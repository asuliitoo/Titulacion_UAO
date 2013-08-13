$(document).ready(function(){
   
		//$('#div_opc').fadeOut('slow');

		$('#add_user').on('click', function(){
		$('#div_opc').fadeIn('slow');
		$('#div_opc').load('registro_funcion.php');
		});

	$('#cargar').on('click', function(){
		$('#div_opc').fadeIn('slow');
		$('#div_opc').load('formulario_archivo.html');
		});


    

});