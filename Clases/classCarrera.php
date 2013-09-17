<?php 
	
	include_once('Conexion.php');

	class Licenciatura{

		private $conexion;
		private $msjSuccess = "Licenciatura agregada correctamente";
		private $msjWarning = "Algo salio mal, intente otra vez";
		private $msjError = "Al parecer, la Licenciatura ya existe";


		function __construct($Conn){
			$this->conexion = $Conn;
		}


		function nuevaLicenciatura($nombre,$area,$subArea,$nivel,$consecutivo){

			$existe = $this->existeLicenciaturaDatos($nombre,$area,$subArea,$nivel,$consecutivo);

			if($existe)
				{	return $this->msjError;	}

			else{

				$sql = "INSERT INTO carrera (nombre_carrera,i_area,i_subArea,i_nivel,consecutivo) 
							  VALUES ('$nombre',$area,$subArea,$nivel,$consecutivo)";

				$sentencia = $this->conexion->consulta($sql);

				if($sentencia)
					{return $this->msjSuccess;}
					
				else
					{return $this->msjWarning;}
			}
				
		}

		function eliminarLicenciatura($id){

			$existe = $this->existeLicenciatura($id);

			if($existe == false){
				return false;
			}
			
			else{
				$sql = "DELETE FROM carrera WHERE id_carrera = '$id' ";
				$borrar = $this->conexion->consulta($sql);

				if ($borrar)
					return true;	
				
				else
					return false;
			}			
		}

		function actualizarLicenciatura($nombre,$area,$subArea,$nivel,$consecutivo,$id){

			$sql = "UPDATE carrera SET nombre_carrera = '$nombre', i_area = $area, i_subArea = $subArea, i_nivel=$nivel, consecutivo=$consecutivo
					WHERE id_carrera = $id";

			$actuliza = $this->conexion->consulta($sql);

			if($actuliza)
				return true;
			else 
				return false;

		}

		function existeLicenciatura($id){
			
			$sql = "SELECT * FROM carrera WHERE id_carrera = '$id'";

			$existe = $this->conexion->consulta($sql);

			$num = $existe->num_rows;
			
			if ( $num == 0)
				return false;			
			
			else 
				return true;
		}

		function existeLicenciaturaDatos($nombre,$area,$subArea,$nivel,$consecutivo){

			$sql = "SELECT * FROM carrera WHERE nombre_carrera = '$nombre' 
												AND i_area = $area
												AND i_subArea = $subArea
												AND i_nivel = $nivel
												AND consecutivo = $consecutivo";

			$existe = $this->conexion->consulta($sql);
			
			$num = $existe->num_rows;
			
			if ( $num == 0)
				return false;			
			
			else 
				return true;			
		}



	}
?>