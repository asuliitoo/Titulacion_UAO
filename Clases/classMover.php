<?php  

	include_once('Conexion.php');

	class Mover{

		private $conexion;
		private $names=0;
		private $insertNames=0;


		function __construct($Conn){
			$this->conexion = $Conn;
		}

		/**
		*	@param 	validaciones 	Array 	Arreglo con las validaciones de un alumno
		*/
		function verificaValidaciones(){

			$validados = 0;
			$registros = 0;

			$sql = "SELECT fk_alumno, idiomas,documento_firmas, servicio_social,pago_titulacion FROM validaciones";


			$sentencia = $this->conexion->consulta($sql);
			$registros = 0;
			//ECHO $registros;

			while($row = mysqli_fetch_array($sentencia)){

				if($row['idiomas']=='1' AND $row['documento_firmas']=='1' AND $row['servicio_social']=='1' AND $row['pago_titulacion']=='1'){
					$sql = "UPDATE validaciones SET estado_validacion='1' WHERE fk_alumno=$row[fk_alumno]";
					$result = $this->conexion->consulta($sql);
					$registros = $registros + 1;
					if(!$result)
						{ ECHO "Error: El alumno FK $row[fk_alumno] no se pudo procesar"; 
							return false;
						}
						
					else{
						$validados = $validados + 1;
					}

				}
				else{
					$sql = "UPDATE validaciones SET estado_validacion='0' WHERE fk_alumno=$row[fk_alumno]";
					$result = $this->conexion->consulta($sql);
					if(!$result)
						ECHO "Error: El alumno FK $row[fk_alumno] no se pudo procesar";

				}
			}

			if ($validados == $registros){
				return true;
			}
			else
				return false;
		}


		function copiaDatos(){

			$elimina = "TRUNCATE TABLE titulacion";
			$borrado = $this->conexion->consulta($elimina);

			
				$sql = "INSERT INTO titulacion (fk_alumno) 
					SELECT (fk_alumno)
					FROM validaciones
					WHERE estado_validacion = '1' ";

				$result = $this->conexion->consulta($sql);

			$elimina = "TRUNCATE TABLE profesionista";
			$borrado = $this->conexion->consulta($elimina);

				$sql2 = "INSERT INTO profesionista (fk_alumno) 
					SELECT (fk_alumno)
					FROM validaciones
					WHERE estado_validacion = '1' ";
						
				$result2 = $this->conexion->consulta($sql2);

				$Q="SELECT fk_alumno FROM titulacion";
				$result = $this->conexion->consulta($Q);


				while($row = mysqli_fetch_array($result)){

					$fk = $row['fk_alumno'];
					//ECHO $alumno;

					$query = "SELECT nombre_alumno 
							  FROM alumno 
							  WHERE id_alumno = $fk";

					$nombre = $this->conexion->consulta($query);

					
					while($alumno=mysqli_fetch_array($nombre)){
						$this->names=$this->names+1;

						$consulta = "UPDATE titulacion 
						SET nombre='$alumno[nombre_alumno]',
							nombre_rector = (SELECT nombre_rector FROM constantes),
							administracion_escolar = (SELECT admin_escolar FROM constantes),
							institucion = (SELECT institucion FROM constantes),
							entidad_institucion = (SELECT entidad_institucion FROM constantes),
							examen_profesional = (SELECT ex_profesional FROM constantes),
							exp_titulo = (SELECT exp_titulo FROM constantes),
							certificacion = (SELECT exp_certificado FROM constantes)
							WHERE fk_alumno='$fk'";

						$res = $this->conexion->consulta($consulta);
						if($res){
							$this->insertNames=$this->insertNames+1;
						}
					}
				}

				if($this->names==$this->insertNames){
					return true;
				}
				else{
					return false;
				}
		}//END Function

		
	}//End Clase
?>