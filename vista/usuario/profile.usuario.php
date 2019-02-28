<!DOCTYPE html>
<html>
	<head>
		<title>iPet</title>
		<link rel="stylesheet" type="text/css" href="vista/css/style.css">
	</head>
	<body class='perfil'>
		<?php
					if (isset($_SESSION["sesion"])) {
						?>
						<div class="menu" id="menu">
							<div class="left">
								<a href="index.php?mod=home&ope=index">Inicio</a>
								<?php
									if (($_SESSION["sesion"] == "admin") || ($_SESSION["sesion"] == "admin@admin.com")) {
										echo '<a href="index.php?mod=home&ope=admin">Administrar</a>' ;
									} else {
										echo '<a href="index.php?mod=home&ope=match&usuario='.$usuario->getUsuario().'>Match</a>' ;
									}
								?>
								<a href="#">News</a>
								<a href="#">Contact</a>
								<a href="#">About</a>
							</div>
							<div class="right">
					<?php

						require_once "create_square_image.php" ;

						if (!file_exists("assets/img/".$usuario->getUsuario())) {
							mkdir("assets/img/".$usuario->getUsuario());
						}

						if (!file_exists("assets/img/".$usuario->getUsuario()."/".$usuario->getUsuario()."_thumb.jpg")) {
							if ($usuario->getImagen() == "/path/to/image") {
								$img = create_square_image("assets/img/background.jpg", "assets/img/".$usuario->getUsuario()."/".$usuario->getUsuario()."_thumb.jpg", 200);
							} else {
								$img = create_square_image($usuario->getImagen(), "assets/img/".$usuario->getUsuario()."/".$usuario->getUsuario()."_thumb.jpg", 200);
							}
						}
					?>
						<div class="dropdown">
							<button class="dropbtn">
								<img class="thumbnail" src="assets/img/<?=$usuario->getUsuario()?>/<?=$usuario->getUsuario()?>_thumb.jpg" width="35px" />
							</button>
							<div class="dropdown-content">
								<a href="index.php?mod=usuario&ope=index&usuario=<?=$usuario->getUsuario()?>">Perfil</a>
								<?php
									if (($_SESSION["sesion"] == "admin") || ($_SESSION["sesion"] == "admin@admin.com")) {
										echo '<a href="index.php?mod=home&ope=admin">Administrar</a>' ;
									}
								?>
								<a href="index.php?mod=home&ope=signout">Cerrar Sesión</a>
							</div>
						</div>
				<?php
					} else { // if
				?>
					<a href="index.php?mod=home&ope=signin">Iniciar Sesión</a>
					<a href="index.php?mod=home&ope=signup">Registrarme</a>
				<?php
					} // if
				?>
			</div>
		</div>

		<div class="container">
			<?php
				if ($usuario->getImagen() != "/path/to/image") {
					?>
						<div id="profile-image-header" style="background-image: url('<?=$usuario->getImagen()?>');">
							<div class="profile-image-container">
								<img src="<?=$usuario->getImagen()?>">
								<h2 class="username"><?= $usuario->getNombre(); ?></h2>
							</div>
						</div>
					<?php
				} else {
					?>
						<div id="profile-image-header" style="background-image: url('assets/img/background.jpg');"></div>
						<div class="profile-image-container">
					<?php

						if (!file_exists("assets/img/".$usuario->getUsuario()."/".$usuario->getUsuario()."_profile.jpg")) {
							if ($usuario->getImagen() == "/path/to/image") {
								$img = create_square_image("assets/img/background.jpg", "assets/img/".$usuario->getUsuario()."/".$usuario->getUsuario()."_profile.jpg", 500);
							} else {
								$img = create_square_image($usuario->getImagen(), "assets/img/".$usuario->getUsuario()."/".$usuario->getUsuario()."_profile.jpg", 500);
							}
						}

						echo "<img src='assets/img/".$usuario->getUsuario()."/".$usuario->getUsuario()."_profile.jpg' width='100px'>";
					?>
							<h2 class="username"><?= $usuario->getNombre(); ?></h2>
						</div>
					<?php
				}			
				
				if (isset($_SESSION["sesion"])) {
					echo ($usuario->getGenero() == "masculino") ? "<h1 class='titulo'>Bienvenido a iPet</h1>" : "<h1 class='titulo'>Bienvenida a iPet</h1>";
			?>
						
						<h3 class="subtitulo-1">¡Una red social pensada en los animales!</h3>
						<h4 class="subtitulo-2">¿Qué tal el día, <?=$usuario->getNombre()?>?</h4>

						<a href="#" class="home-button-R"><span>Jugar Match</span></a>

			<?php
				} else { // if
			?>
						<h1 class="titulo">Bienvenido/a a iPet</h1>
						<h3 class="subtitulo-1">¡Una red social pensada en los animales!</h3>
						<h4 class="subtitulo-2">¿Qué deseas hacer?</h4>

						<a href="index.php?mod=home&ope=signin" class="home-button-L"><span>Iniciar Sesión</span></a>
						<a href="index.php?mod=home&ope=signup" class="home-button-R"><span>Registrarme</span></a>
			<?php
				} // if
			?>			  
		</div>
	</body>
</html>