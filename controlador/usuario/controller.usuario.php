<?php

	require_once "modelo/Usuario.php";

	class controllerUsuario
	{
		// Constructor
		public function __construct() {}

		// Métodos
		
		// Acción por defecto (punto de entrada al controlador).
		// Obtiene un listado completo de los usuarios almacenados en la base de datos,
		// y los muestra por pantalla
		public function index()
		{
			if (isset($_GET["usuario"])) {
				$usuario = Usuario::getUser($_GET["usuario"]) ;
				$mascotas = Usuario::getPets($_GET["usuario"]) ;

				session_start() ;

				require_once "vista/usuario/profile.usuario.php" ;
				
			} else {
				$usuarios = Usuario::getAllUsers() ;

				require_once "vista/usuario/index.usuario.php" ;
			}
			
		}

		//
		// Si se nos proporciona información sobre el usuario,
		// lo crea e inserta en la base de datos; en otro
		// caso, redirigimos al usuario al formulario de creación
		public function create()
		{
			if (isset($_GET["usuario"]))
			{
				$usr = new Usuario() ;
				$usr->setUsuario($_GET["usuario"]) ;
				$usr->setEmail($_GET["email"]) ;
				$usr->setContrasena($_GET["contrasena"]) ;
				$usr->setNombre($_GET["nombre"]) ;
				$usr->setIdRol(2) ;
				$usr->setEdad($_GET["edad"]) ;
				$usr->setGenero($_GET["genero"]) ;
				$usr->setImagen("/path/to/image") ;

				$usr->insert() ;
				$this->index() ;
			} else {
				require_once "vista/usuario/create.usuario.php" ;
			}
		}
		

		public function update()
		{
			$username = $_GET["usuario"] ?? "" ;
			if (!empty($username))
			{
				$usr = Usuario::getUser($username) ;
				if (isset($_GET["email"]))
				{
					$usr->setEmail($_GET["email"]) ;
					$usr->setContrasena($_GET["contrasena"]) ;
					$usr->setNombre($_GET["nombre"]) ;
					$usr->setEdad($_GET["edad"]) ;
					$usr->setGenero($_GET["genero"]) ;
					$usr->setImagen($_GET["imagen"]) ;
					$usr->update() ;
					$this->index() ;
				} else {
					$ema = $usr->getEmail() ;
					$con = $usr->getContrasena() ;
					$nom = $usr->getNombre() ;
					$eda = $usr->getEdad() ;
					$gen = $usr->getGenero() ;
					$ima = $usr->getImagen() ;
					require_once "vista/usuario/update.usuario.php" ;
				}
			} else {
				$this->index() ;
			}
		}


		// Si se nos proporciona el identificador del tablero,
		// procedemos a su borrado; en otro caso, regresamos
		// al listado de tableros.
		public function delete()
		{
			if (isset($_GET["usuario"]))
			{
				$username = $_GET["usuario"] ;
				Usuario::deleteUser($username) ;
				$this->index() ;
			} else {
				$this->index() ;
			}
		}
	}