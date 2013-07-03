<?php

	class Conexion{

		private $servidor	= 'localhost';
		private $usuario	= 'root';
		private $contraseña	= '';
		private $base_datos	= 'stitulacion';

		private $error_con = "Error de conexion";

		function conecta(){
			$con = new mysqli ($this->servidor,$this->usuario,$this->contraseña,$this->base_datos);
			$con->query("SET NAMES 'utf8' ");

			if ($con->connect_error){

				ECHO "$error_con ($con->connect_errno),$con->connect_error\n";
				exit;
			}
			else{
				//ECHO "Conexion exitosa";
				return $con;
			}

		}
	}
?>