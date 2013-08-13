<?php 
	
	include_once('Conexion.php');

	class Bachillerato{

		private $conexion;
		private $msjError = "Al parecer el Bachillerato ya existe";


		function __construct($Conn){
			$this->conexion = $Conn;
		}


		function nuevoBachillerato ($bachillerato, $entidad){

			$existe = $this->existeBachillerato($bachillerato);
			
			if($existe)
				{	return $this->msjError;	}
			
			else{

				$sql = "INSERT INTO preparatoria (nombre_preparatoria, entidad_preparatoria) 
							  VALUES ('$bachillerato','$entidad')";

				$sentencia = $this->conexion->consulta($sql);

				if($sentencia)
					{return true;}
					
				else
					{return false;}
			}
				
		}

		function eliminarBachillerato($bachillerato){

			$existe = $this->existeBachillerato($bachillerato);

			if($existe == false){
				return false;
			}
			else{
				$sql = "DELETE FROM preparatoria WHERE nombre_preparatoria = '$bachillerato' ";
				$borrar = $this->conexion->consulta($sql);

				if ($borrar)
					return true;	
				
				else
					return false;
			}			
		}

		function actualizarBachillerato($bachillerato, $entidad,$id){
			/*
			$sql = "UPDATE preparatoria SET nombre_carrera = $bachillerato, i_area = $area, i_subArea = $subArea, i_nivel=$nivel, consecutivo=$consecutivo
					WHERE id_usuario = $id";

			$actuliza = $this->conexion->consulta($sql);

			if($actuliza)
				return true;
			else 
				return false;
				*/
		}

		function existeBachillerato($bachillerato){
			
			$sql = "SELECT * FROM preparatoria WHERE nombre_preparatoria = '$bachillerato'";

			$existe = $this->conexion->consulta($sql);			

			$num = $existe->num_rows;
			
			if ( $num == 0)
				return false;			
			
			else 
				return true;
		}



	}
?>