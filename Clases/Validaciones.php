<?php 
	include_once('Conexion.php');
	
	class Validaciones{

		private $idiomas;
		private $documento;
		private $servicio;
		private $pago;
		private $alumno;
		private $conexion;


		function __construct($Conn){
			$this->conexion = $Conn;
		}

		function agregarValidacion($validaciones,$alumno){
			$idiomas 	=$validaciones[0];
			$firmas 	=$validaciones[1];
			$servicio 	=$validaciones[2];
			$pago 		=$validaciones[3];


			$sql = "UPDATE validaciones
					SET idiomas = $idiomas,
						documento_firmas = $firmas,
						servicio_social = $servicio,
						pago_titulacion = $pago
					WHERE fk_alumno = $alumno";

			$result = $this->conexion->consulta($sql);
			
			//var_dump($result);

			if ($result)
				return true;
			else
				return false;
		}	

	}
?>

