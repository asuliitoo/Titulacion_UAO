$(document).ready(function(){


	$('#content').load('portada.html');

	$('#titulo').click(function(){
		$('#btn1,#btn0,#btn2,#btn3,#btn4,#btn5').removeClass("botonactivo");
		$('#content').hide('slow');	
		$('#content').fadeIn('slow');
		$('#content').load('portada.html');
	});	

	$('#btn0').on('click', function(){
		$('#btn1,#btn2,#btn3,#btn4,#btn5').removeClass("botonactivo");
		$('#btn0').addClass("botonactivo");
		$('#content').fadeOut('slow');
		$('#content').fadeIn('slow');
		$('#content').load('configuracion.html');
	});

	$('#btn1').click(function(){
		$('#btn0,#btn2,#btn3,#btn4,#btn5').removeClass("botonactivo");
		$('#btn1').addClass("botonactivo");
		$('#content').fadeOut('fast');
		$('#content').fadeIn('slow');
		$('#content').load('verCandidatos.php');
	});

	$('#btn2').click(function(){
		$('#btn0,#btn1,#btn3,#btn4,#btn5').removeClass("botonactivo");
		$('#btn2').addClass("botonactivo");
		$('#content').fadeOut('fast');
		$('#content').fadeIn('slow');
		$('#content').load('validaciones.php');
	});


	$('#btn5').click(function(){
		$('#btn0,#btn1,#btn2,#btn3,#btn4').removeClass("botonactivo");
		$('#btn5').addClass("botonactivo");
		$('#content').fadeOut('fast');
		$('#content').fadeIn('slow');
		$('#content').load('exportables.html');
	});
	
});