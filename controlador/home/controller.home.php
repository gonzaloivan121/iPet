<?php
	require_once "modelo/Usuario.php";
	require_once "modelo/Especie.php";
	require_once "modelo/Mascota.php";
	require_once "modelo/Raza.php";

	class controllerHome
	{
		// Constructor
		public function __construct() {}

		// Métodos
		
		// Acción por defecto (punto de entrada al controlador).
		// Obtiene un listado completo de los usuarios almacenados en la base de datos,
		// y los muestra por pantalla
		public function index()
		{
			if (!isset($_SESSION)) {
				session_start() ;
			}

			if (isset($_SESSION["sesion"])) {
				$get = explode("@", $_SESSION["sesion"]) ;

				if (!(sizeof($get) > 1)) {
					$usuario = Usuario::getUser($_SESSION["sesion"]) ;
				} else {
					$usuario = Usuario::getUserbyEmail($_SESSION["sesion"]) ;
				}
			}
			
			require_once "vista/home/index.home.php" ;
		}




		public function signup()
		{
			if (isset($_GET["username"]))
			{

			} else {
				require_once "vista/usuario/signup.usuario.php" ;
			}
		}



		public function signin()
		{
			if (isset($_GET["usuario"]) && isset($_GET["password"]))
			{
				/*$get = explode("@", $_GET["usuario"]) ;

				if ((sizeOf($get) == 1)) {

					$username = $_GET["usuario"] ;
					$usuario = Usuario::getUserByUserPassword($username, $_GET["password"]) ;
				} else {

					$email = $_GET["usuario"] ;
					$usuario = Usuario::getUserByEmailPassword($email, $_GET["password"]) ;
				}*/

				$usuario = Usuario::login($_GET["usuario"], $_GET["password"]) ;

				//require_once "vista/home/index.home.php" ;

				$this->index() ;
				
			} else {
				require_once "vista/usuario/signin.usuario.php" ;
			}
		}


		public function signout() {
			session_start() ;

			if (isset($_SESSION["sesion"])) {
				session_destroy() ;
				$_SESSION = [] ;

				$this->index() ;
			} else {

				$this->index() ;
			}
		}


		public function view() {
			$idMascota = $_GET["idMascota"] ?? "" ;

			if (!empty($idMascota)) {
				$mascota = Mascota::getMascota($idMascota) ;
				$usr = Usuario::getUser($_GET["usuario"]) ;
				
				require_once "vista/mascota/perfil.mascota.php" ;
			} else {

				$this->index() ;
			}
		}

	}