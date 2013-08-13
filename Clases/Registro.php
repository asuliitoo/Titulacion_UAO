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
		private $msjUsuarioError = "Ya existe un nombre de usuario con ese nombre";


		function __construct($Conn){

			$this->conexion = $Conn;			
		}
		/**
		* @return 		Boolean
		*/
		function crearUsuario($usuario,$password,$rol){

			$existe = $this->existeUsuario($usuario,$password);

			if(!$existe){

				$this->usuario = strtolower($usuario);
				$this->password = $this->encriptarPassword($password);

				$nuevoUsuario = "INSERT into usuario(nombre_usuario, password, fk_rol)
								VALUES ('$this->usuario','$this->password','$rol')";

				$registro = $this->conexion->consulta($nuevoUsuario);

				if($registro){
					return $this->msjUsuarioCreado;
				}	
			}
			else{
				return $this->msjUsuarioError;
			}				
		}

		function eliminarUsuario($usuario,$password){

			$existe = $this->existeUsuario($usuario,$password);

			if(!$existe){
				return $this->msjUsuarioNoExiste;

			}
			else{
				$query = "DELETE FROM usuario WHERE nombre_usuario = '$usuario' ";
				$borrar = $this->conexion->consulta($query);

				if ($borrar)
					return $this->msjUsuarioEliminado;	
				
				else
					return $this->msjUsuarioEliminadoError;
			}			
		}

		function actualizarUsuario($usuario,$password,$id){
			$q_actualizar = "UPDATE usuario SET nombre_usuario = $usuario, password = $password
							WHERE id_usuario = $id";
			$actuliza = $this->conexion->consulta($q_actualizar);

			if($actuliza)
				return $msjUsuarioActualiza;
			else 
				return $msjUsuarioActualizaError;
		}

		function existeUsuario($usuario,$password){
			
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
