<?php

	include_once('Conexion.php');

	class Registro{

		private $rol;
		private $usuario;
		private $password;
		private $password2;
		private $cadena = '::::_____&&2Gg#';
		private $conexion;
		
		private $msjUsuarioActualizaError = "El usuario no se ha podido actualizar";
		private $msjUsuarioActualiza = "El usuario se ha actualizado correctamente";

		private $msjUsuarioEliminadoError = "El usuario no se ha podido eliminar";
		private $msjUsuarioEliminado = "El usuaro ha sido eliminado";

		private $msjUsuarioNoExiste = "El usuario no existe";		
		private $msjUsuarioCreado = "Usuario creado";
		private $msjUsuarioNoCreado = "El Usuario no se ha podido crear, intente otra vez.";
		private $msjUsuarioError = "Ya existe un usuario con ese nombre";


		function __construct($Conn){

			$this->conexion = $Conn;			
		}
		/**
		* @return 		Boolean
		*/
		function crearUsuario($usuario,$password,$rol){

			$existe = $this->existeNombre($usuario);

			if(!$existe){

				$this->usuario = strtolower($usuario);
				$this->password = $this->encriptarPassword($password);

				$sqlROl = "SELECT id_rol FROM rol WHERE nombre_rol = '$rol'";
				$ROL = $this->conexion->consulta($sqlROl);

				$r = mysqli_fetch_array($ROL);

				$nuevoUsuario = "INSERT into usuario(nombre_usuario, password, fk_rol)
								VALUES ('$this->usuario','$this->password','$r[id_rol]')";

				$registro = $this->conexion->consulta($nuevoUsuario);

				if($registro){
					return $this->msjUsuarioCreado;
				}	
				else 
					return $this->msjUsuarioNoCreado;
			}
			else{
				return $this->msjUsuarioError;
			}				
		}

		function eliminarUsuario($id){

			$existe = $this->existeUsuario($id);

			if(!$existe){
				return $this->msjUsuarioNoExiste;

			}
			else{
				$query = "DELETE FROM usuario WHERE id_usurio = '$id' ";
				$borrar = $this->conexion->consulta($query);

				if ($borrar)
					return $this->msjUsuarioEliminado;	
				
				else
					return $this->msjUsuarioEliminadoError;
			}			
		}

		function actualizarUsuario($usuario,$password,$rol,$id){

			$sql = "SELECT id_rol FROM rol WHERE nombre_rol = '$rol' ";
			$R = $this->conexion->consulta($sql);
			$id_rol = mysqli_fetch_array($R);
			

			$this->password = $this->encriptarPassword($password);			
			
				$q_actualizar = "UPDATE usuario SET nombre_usuario = '$usuario', 
												fk_rol = $id_rol[id_rol],
												password = '$this->password'
							WHERE id_usurio = $id";
				$actuliza = $this->conexion->consulta($q_actualizar);

				if($actuliza)
					return $this->msjUsuarioActualiza;
				else 
					return $this->msjUsuarioActualizaError;
			
		}

		function existeUsuario($id){
			
			$query = "SELECT * FROM usuario WHERE id_usurio = '$id'";

			$existe = $this->conexion->consulta($query);

			$num = $existe->num_rows;
			if ( $num == 0)
				return false;			
			
			else 
				return true;
		}

		function buscaUsuario($usuario,$password){

			$this->password = $this->encriptarPassword($password);
			
			$query = "SELECT nombre_usuario, password FROM usuario WHERE nombre_usuario = '$usuario' AND password = '$this->password'";
			$existe = $this->conexion->consulta($query);

			$num = $existe->num_rows;
			if ( $num == 0)
				return false;			
			
			else 
				return true;

		}


		function existeNombre($usuario){
			
			$query = "SELECT nombre_usuario FROM usuario WHERE nombre_usuario = '$usuario'";
			$existe = $this->conexion->consulta($query);

			$num = $existe->num_rows;
			if ( $num == 0)
				return false;			
			
			else 
				return true;
		}

		/**
		* @return 		String 		Contraseña encriptada
		*/
		function encriptarPassword($pass){

			$this->password = $pass.$this->cadena;
			$this->password = md5($this->password);

			return $this->password;
		}
	}

?>
