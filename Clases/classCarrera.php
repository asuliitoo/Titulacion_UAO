<?php 
	
	include_once('Conexion.php');

	class Licenciatura{

		private $conexion;
		private $msjError = "Al parecer, la Licenciatura ya existe";


		function __construct($Conn){
			$this->conexion = $Conn;
		}


		function nuevaLicenciatura($nombre,$area,$subArea,$nivel,$consecutivo){

			$existe = $this->existeLicenciatura($nombre);
			
			if($existe)
				{	return $this->msjError;	}

			else{

				$sql = "INSERT INTO carrera (nombre_carrera,i_area,i_subArea,i_nivel,consecutivo) 
							  VALUES ('$nombre',$area,$subArea,$nivel,$consecutivo)";

				$sentencia = $this->conexion->consulta($sql);

				if($sentencia)
					{return true;}
					
				else
					{return false;}
			}
				
		}

		function eliminarLicenciatura($nombre){

			$existe = $this->existeLicenciatura($nombre);

			if($existe == false){
				return false;

			}
			else{
				$sql = "DELETE FROM carrera WHERE nombre_carrera = '$nombre' ";
				$borrar = $this->conexion->consulta($sql);

				if ($borrar)
					return true;	
				
				else
					return false;
			}			
		}

		function actualizarLicenciatura($nombre,$area,$subArea,$nivel,$consecutivo,$id){
			/*
			$sql = "UPDATE carrera SET nombre_carrera = $nombre, i_area = $area, i_subArea = $subArea, i_nivel=$nivel, consecutivo=$consecutivo
					WHERE id_usuario = $id";

			$actuliza = $this->conexion->consulta($sql);

			if($actuliza)
				return true;
			else 
				return false;
				*/
		}

		function existeLicenciatura($nombre){
			
			$sql = "SELECT * FROM carrera WHERE nombre_carrera = '$nombre'";

			$existe = $this->conexion->consulta($sql);

			$num = $existe->num_rows;
			
			if ( $num == 0)
				return false;			
			
			else 
				return true;
		}



	}
?>