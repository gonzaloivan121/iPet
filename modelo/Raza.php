<?php

require_once "Database.php" ;

	class Raza
	{
		// Atributos
		private $idRaza  	;
		private $nombre 	;

		// Constructor
		public function __construct()
		{

		}

		// Getter
		public function getIdRaza() { return $this->idRaza; }
		public function getNombre() { return $this->nombre; }

		// Setter
		public function setNombre($nom) { $this->nombre = $nom; }

		// Métodos
		public function insert()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("INSERT INTO raza(nombre) VALUES (:nom) ;",
				[ ":nom" => $this->nombre ]) ;

			$this->idRaza = $bd->getLastId() ;
		}


		public function update()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("UPDATE raza SET nombre=:nom WHERE idRaza=:raz ;",
				[ ":nom" => $this->nombre,
				  ":raz" => $this->idRaza ]) ;
		}


		public static function getAllRaces()
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM raza ;") ;

			$razas = [] ;

			while ($raz = $bd->getRow("Raza"))
			{
				array_push($razas, $raz) ;
			}
			return $razas ;
		}


		public static function deleteRace($raz)
		{
			$bd = Database::getInstance() ;
			$bd->doQuery("DELETE FROM raza WHERE idRaza=:raz ;",
				[ ":raz" => $raz ]) ;
		}


		public static function getRace($raz) {
			$bd = Database::getInstance() ;
			$bd->doQuery("SELECT * FROM raza WHERE idRaza=:raz ;",
				[ ":raz" => $raz ]) ;

			return $bd->getRow("Raza") ;
		}


		public function __toString()
		{
			return " [ { $this->idRaza, $this->nombre } ] " ;
		}
	}
?>