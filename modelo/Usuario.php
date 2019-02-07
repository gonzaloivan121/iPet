<?php

require_once "Database.php" ;

	class Usuario
	{
		// Atributos
		private $usuario  	;
		private $email 		;
		private $contrasena ;
		private $nombre 	;
		private $edad 		;
		private $genero 	;
		private $imagen 	;

		// Constructor
		public function __construct()
		{

		}

		// Getter
		public function getUsuario() { return $this->usuario; }
		public function getEmail() { return $this->email; }
		public function getContrasena() { return $this->contrasena; }
		public function getNombre() { return $this->nombre; }
		public function getEdad() { return $this->edad; }
		public function getGenero() { return $this->genero; }
		public function getImagen() { return $this->imagen; }

		// Setter
		public function setUsuario($usr) { $this->usuario = $usr; }
		public function setEmail($ema) { $this->email = $ema; }
		public function setContrasena($con) { $this->contrasena = $con; }
		public function setNombre($nom) { $this->nombre = $nom; }
		public function setEdad($eda) { $this->edad = $eda; }
		public function setGenero($gen) { $this->genero = $gen; }
		public function setImagen($ima) { $this->imagen = $ima; }

		// Métodos
		public function insert()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("INSERT INTO usuario(usuario, email, contrasena, nombre, edad, genero, imagen) VALUES (:usr, :ema, :con, :nom, :eda, :gen, :ima) ;",
				[ ":usr" => $this->usuario,
				  ":ema" => $this->email,
				  ":con" => $this->contrasena,
				  ":nom" => $this->nombre,
				  ":eda" => $this->edad,
				  ":gen" => $this->genero,
				  ":ima" => $this->imagen ]) ;
		}


		public function update()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("UPDATE usuario SET email=:ema, contrasena=:con, nombre=:nom, edad=:eda, genero=:gen, imagen=:ima WHERE usuario=:usr ;",
				[ ":usr" => $this->usuario,
				  ":ema" => $this->email,
				  ":con" => $this->contrasena,
				  ":nom" => $this->nombre,
				  ":eda" => $this->edad,
				  ":gen" => $this->genero,
				  ":ima" => $this->imagen ]) ;
		}


		public static function getAllUsers()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM usuario ;") ;

			$usuarios = [] ;

			while ($usr = $bd->getRow("Usuario"))
			{
				array_push($usuarios, $usr) ;
			}
			return $usuarios ;
		}

		public static function getAllUsernames()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT usuario FROM usuario ;") ;

			$usuarios = [] ;

			while ($usr = $bd->getRow("Usuario"))
			{
				array_push($usuarios, $usr->getUsuario()) ;
			}
			return $usuarios ;
		}


		public static function deleteUser($usr)
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("DELETE FROM usuario WHERE usuario=:usr ;",
				[ ":usr" => $usr ]) ;
		}


		public static function getUser($usr) {
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM usuario WHERE usuario=:usr ;",
				[ ":usr" => $usr ]) ;

			return $bd->getRow("Usuario") ;
		}


		public function __toString()
		{
			return " [ { $this->usuario, $this->nombre } ] " ;
		}
	}
?>