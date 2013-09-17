<?php 
	
	include_once('Conexion.php');

	class Bachillerato{

		private $conexion;
		private $msjSuccess = "Bachillerato agregado correctamente";
		private $msjWarning = "Algo salio mal, intente otra vez";
		private $msjError = "Al parecer el Bachillerato ya existe";


		function __construct($Conn){
			$this->conexion = $Conn;
		}


		function nuevoBachillerato ($bachillerato, $entidad){

			$existe = $this->existeBachilleratoDatos($bachillerato,$entidad);
			
			if($existe)
				{	return $this->msjError;	}
			
			else{

				$sql = "INSERT INTO preparatoria (nombre_preparatoria, entidad_preparatoria) 
							  VALUES ('$bachillerato','$entidad')";

				$sentencia = $this->conexion->consulta($sql);

				if($sentencia)
					{return $this->msjSuccess;}
					
				else
					{return $this->msjWarning;}
			}
				
		}

		function eliminarBachillerato($id){

			$existe = $this->existeBachillerato($id);

			if($existe == false){
				return false;
			}
			else{
				$sql = "DELETE FROM preparatoria WHERE id_preparatoria = '$id' ";
				$borrar = $this->conexion->consulta($sql);

				if ($borrar)
					return true;	
				
				else
					return false;
			}					
		}

		function actualizarBachillerato($bachillerato, $entidad,$id){
			
			$sql = "UPDATE preparatoria SET nombre_preparatoria = '$bachillerato', entidad_preparatoria = '$entidad'
					WHERE id_preparatoria = $id";

			$actuliza = $this->conexion->consulta($sql);

			if($actuliza)
				return true;
			else 
				return false;
			
		}

		function existeBachillerato($id){
			
			$sql = "SELECT * FROM preparatoria WHERE id_preparatoria = '$id'";

			$existe = $this->conexion->consulta($sql);

			$num = $existe->num_rows;
			
			if ( $num == 0)
				return false;			
			
			else 
				return true;
		}

		function existeBachilleratoDatos($nombre_preparatoria,$entidad_preparatoria){
			
			$sql = "SELECT * FROM preparatoria WHERE nombre_preparatoria = '$nombre_preparatoria' 
												AND entidad_preparatoria = '$entidad_preparatoria'";

			$existe = $this->conexion->consulta($sql);
			
			$num = $existe->num_rows;
			
			if ( $num == 0)
				return false;			
			
			else 
				return true;
			
		}



	}
?>