<?php

	class Conexion{

		/**
		* @var String Nombre del servidor
		* @var String Nombre del usuario de la BD
		* @var String Nombre  de la BD
		* @var String password para accesar a la BD 		
		*/
		private $servidor	= 'localhost';
		private $usuario	= 'root';
		private $password	= '';
		private $base_datos	= 'stitulacion';

		private $C;

		private $error_con = "Error de conexion";

		function __construct(){

			$con = new mysqli ($this->servidor,$this->usuario,$this->password,$this->base_datos);
			if ($con->connect_error){

				ECHO "$error_con ($con->connect_errno),$con->connect_error\n";
				$this->C = null;
			}
			else{
				//ECHO "Conexion exitosa";
				$this->C = $con;
			}
		}

		public function limpiar_entrada( $cadena ){

			$nueva = utf8_encode($cadena);
			return $nueva; 
		}


		public function consulta($SQL){

			$this->C->query("SET NAMES 'utf8' ");
			$this->C->set_charset('utf8');

			//$entrada = $SQL;
			
			if (!$this->C){

				return false;
			}

			else{

				return $this->C->query($SQL);
				
			}

			echo "<pre>";
		}

		function __destruct(){
			$this->C->close(); 
		}
	}

	//$Conn = new Conexion();
?>