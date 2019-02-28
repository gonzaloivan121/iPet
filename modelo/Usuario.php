<?php

require_once "Database.php" ;
require_once "Mascota.php"  ;

	class Usuario
	{
		// Atributos
		private $usuario  	;
		private $email 		;
		private $contrasena ;
		private $nombre 	;
		private $idRol		= 2 ;
		private $edad 		;
		private $genero 	;
		private $imagen 	= "/path/to/image" ;

		// Constructor
		public function __construct()
		{

		}

		// Getter
		public function getUsuario() { return $this->usuario; }
		public function getEmail() { return $this->email; }
		public function getContrasena() { return $this->contrasena; }
		public function getNombre() { return $this->nombre; }
		public function getIdRol() { return $this->idRol; }
		public function getEdad() { return $this->edad; }
		public function getGenero() { return $this->genero; }
		public function getImagen() { return $this->imagen; }

		// Setter
		public function setUsuario($usr) { $this->usuario = $usr; }
		public function setEmail($ema) { $this->email = $ema; }
		public function setContrasena($con) { $this->contrasena = $con; }
		public function setNombre($nom) { $this->nombre = $nom; }
		public function setIdRol($idr) { $this->idRol = $idr; }
		public function setEdad($eda) { $this->edad = $eda; }
		public function setGenero($gen) { $this->genero = $gen; }
		public function setImagen($ima) { $this->imagen = $ima; }

		// Métodos
		public function insert()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("INSERT INTO usuario(usuario, email, contrasena, nombre, idRol, edad, genero, imagen) VALUES (:usr, :ema, :con, :nom, :idr, :eda, :gen, :ima) ;",
				[ ":usr" => $this->usuario,
				  ":ema" => $this->email,
				  ":con" => $this->contrasena,
				  ":nom" => $this->nombre,
				  ":idr" => $this->idRol,
				  ":eda" => $this->edad,
				  ":gen" => $this->genero,
				  ":ima" => $this->imagen ]) ;
		}


		public function update()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("UPDATE usuario SET email=:ema, contrasena=:con, nombre=:nom, idRol=:idr, edad=:eda, genero=:gen, imagen=:ima WHERE usuario=:usr ;",
				[ ":usr" => $this->usuario,
				  ":ema" => $this->email,
				  ":con" => $this->contrasena,
				  ":nom" => $this->nombre,
				  ":idr" => $this->idRol,
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

		public static function getUserByEmailPassword($ema, $pwd)
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM usuario WHERE email=:ema AND contrasena=:pwd ;",
				[ ":ema" => $ema,
				  ":pwd" => $pwd ]) ;

			return $bd->getRow("Usuario") ;
		}


		public static function getUserByUserPassword($usu, $pwd)
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM usuario WHERE usuario=:usu AND contrasena=:pwd ;",
				[ ":usu" => $usu,
				  ":pwd" => $pwd ]) ;

			return $bd->getRow("Usuario") ;
		}


		public static function getUserByEmail($ema)
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM usuario WHERE email=:ema ;",
				[ ":ema" => $ema ]) ;			

			return $bd->getRow("Usuario") ;
		}





		public static function login($username, $password)
		{
			$get = explode("@", $username);
			$bd = Database::getInstance() ;

			if ((sizeOf($get) > 1)) {
				$bd->doQuery("SELECT * FROM usuario WHERE email=:ema AND contrasena=:con ;",
					[ ":ema" => $username,
					  ":con" => $password ]) ;
			} else {
				$bd->doQuery("SELECT * FROM usuario WHERE usuario=:usu AND contrasena=:con ;",
					[ ":usu" => $username,
					  ":con" => $password ]) ;
			}

			$ok = false ;
			$usu ;

			if ($usu = $bd->getRow("Usuario")) {
				$ok = true ;
			}

			if ($ok == true) {
				session_start() ;

				$_SESSION["sesion"] = $username ;

				return $usu ;
			} else {

				return 0 ;
			}
		}
		



		public static function deleteUser($usr)
		{
			$bd = Database::getInstance() ;
			$query = "DELETE FROM usuario WHERE usuario=:usr ;" ;
			$bd->doQuery($query,
				[ ":usr" => $usr ]
			) ;

		}


		public static function getUser($usr) {
			$get = explode("@", $usr);
			$bd = Database::getInstance() ;

			if ((sizeOf($get) > 1)) {
				$bd->doQuery("SELECT * FROM usuario WHERE email=:ema ;",
					[ ":ema" => $usr ]) ;
			} else {
				$bd->doQuery("SELECT * FROM usuario WHERE usuario=:usu ;",
					[ ":usu" => $usr ]) ;
			}

			return $bd->getRow("Usuario") ;
		}

		public static function getPets($usr) {
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM mascota WHERE usuario=:usr ;",
				[ ":usr" => $usr ]) ;

			$mascotas = [] ;

			while ($mas = $bd->getRow("Mascota"))
			{
				array_push($mascotas, $mas) ;
			}
			return $mascotas ;
		}



		public function __toString()
		{
			return " [ { Usuario: $this->usuario, Nombre: $this->nombre } ] " ;
		}
	}
?>