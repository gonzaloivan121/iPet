<?php

require_once "Database.php" ;

	class Mascota
	{
		// Atributos
		private $idMascota ;
		private $usuario ;
		private $idEspecie ;
		private $idRaza ;
		private $nombre ;
		private $genero ;
		private $color ;
		private $imagen ;

		// Constructor
		public function __construct() {}

		// Getter
		public function getIdMascota() { return $this->idMascota ; }
		public function getUsuario() { return $this->usuario ; }
		public function getIdEspecie() { return $this->idEspecie ; }
		public function getIdRaza() { return $this->idRaza ; }
		public function getNombre() { return $this->nombre ; }
		public function getGenero() { return $this->genero ; }
		public function getColor() { return $this->color ; }
		public function getImagen() { return $this->imagen ; }

		// Setter
		public function setUsuario($usu) { $this->usuario = $usu ; }
		public function setIdEspecie($ide) { $this->idEspecie = $ide ; }
		public function setIdRaza($idr) { $this->idRaza = $idr ; }
		public function setNombre($txt) { $this->texto = $txt ; }
		public function setGenero($gen) { $this->genero = $gen ; }
		public function setColor($col) { $this->color = $col ; }
		public function setImagen($ima) { $this->imagen = $ima ; }

		// Métodos
		public function insert()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("INSERT INTO mascota(nombre, idEspecie, idRaza, genero, color, imagen, usuario) VALUES (:nom, :ide, :idr, :gen, :col, :ima, :usu) ;",
				[ ":nom" => $this->nombre,
				  ":ide" => $this->idEspecie,
				  ":idr" => $this->idRaza,
				  ":gen" => $this->genero,
				  ":col" => $this->color,
				  ":ima" => $this->imagen,
				  ":usu" => $this->usuario ]) ;

			$this->idMascota = $bd->getLastId() ;
		}

		public function update()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("UPDATE mascota SET nombre=:nom, idEspecie=:ide, idRaza=:idr, genero=:gen, color=:col, imagen=:ima, usuario=:usu WHERE idMascota=:idm ;",
				[ ":nom" => $this->nombre,
				  ":ide" => $this->idEspecie,
				  ":idr" => $this->idRaza,
				  ":gen" => $this->genero,
				  ":col" => $this->color,
				  ":ima" => $this->imagen,
				  ":usu" => $this->usuario,
				  ":idm" => $this->idMascota ]) ;
		}

		public function delete()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("DELETE FROM mascota WHERE idMascota=:idm ;",
				[ ":idm" => $this->idMascota ]) ;
		}

		/*
		// Obtener todas las mascotas de un usuario dado
		public static function getAllMascotas($params)
		{
			$params = [
				":usu" => $usu,
				":ide" => $ide,
				":idr" => $idr
			];

			$bd = Database::getInstance() ;

			if (!empty($usu) && !empty($ide) && !empty($idr)) {
				$bd->doQuery("SELECT * FROM mascota WHERE usuario=:usu AND idEspecie=:ide AND idRaza=:idr ;", $params) ;

			} elseif (!empty($usu) && !empty($ide) && empty($idr)) {
				$bd->doQuery("SELECT * FROM mascota WHERE usuario=:usu AND idEspecie=:ide ;", $params) ;

			} elseif (!empty($usu) && empty($ide) && empty($idr)) {
				$bd->doQuery("SELECT * FROM mascota WHERE usuario=:usu ;", $params) ;

			} elseif (!empty($usu) && !empty($ide) && !empty($idr)) {
				$bd->doQuery("SELECT * FROM mascota WHERE usuario=:usu AND idEspecie=:ide ;", $params) ;

			}
			

			$mascotas = [] ;

			while ($mascota = $bd->getRow("Mascota"))
			{
				array_push($mascotas, $mascota) ;
			}
			return $mascotas ;
		}
		*/

		// Obtener todas las mascotas de un usuario, raza y/o especie dadas
		public static function getAllMascotas($params) {
			$bd = Database::getInstance() ;
			$query = "SELECT * FROM mascota" ;

			foreach ($params as $key => $value) {
				print_r($key."->".$value);
			}
		}


		public static function deleteMascota($idm)
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("DELETE FROM mascota WHERE idMascota=:idm ;",
				[ ":idm" => $idm ]) ;
		}


		public static function getMascota($idm) {
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM mascota WHERE idMascota=:idm ;",
				[ ":idm" => $idm ]) ;

			return $bd->getRow("Mascota") ;
		}


		public function __toString()
		{
			return " [ { idMascota: $this->idMascota, usuario: $this->usuario, idEspecie: $this->idEspecie, idRaza: $this->idRaza, nombre: $this->nombre, genero: $this->genero, color: $this->color, genero: $this->genero } ] " ;
		}
	}
?>