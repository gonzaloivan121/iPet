<!DOCTYPE html>
<html>
	<head>
		<title>iPet</title>
		<link rel="stylesheet" type="text/css" href="/iPet/vista/css/style.css">
	</head>
	<body class="inicio">
		<div class="menu" id="menu">
			<div class="left">
				<a href="#" class="active">Inicio</a>
				<?php
					if (isset($_SESSION["sesion"])) {
						echo "<a href='/ipet/index.php?mod=home&ope=match&usuario=".$usuario->getUsuario()."'>Match</a>" ;
					}
				?>
				<a href="#">News</a>
				<a href="#">Contact</a>
				<a href="#">About</a>
			</div>
			<div class="right">
				<?php
					if (isset($_SESSION["sesion"])) {
						?>
							<div class="dropdown">
								<button class="dropbtn"><?=$usuario->getUsuario()?></button>
								<div class="dropdown-content">
									<a href="/ipet/index.php?mod=usuario&ope=index&usuario=<?=$usuario->getUsuario()?>">Perfil</a>
									<a href="/ipet/index.php?mod=home&ope=signout">Cerrar Sesión</a>
								</div>
							</div>
						<?php
					} else {
						?>
							<a href="/ipet/index.php?mod=home&ope=signin">Iniciar Sesión</a>
							<a href="/ipet/index.php?mod=home&ope=signup">Registrarme</a>
						<?php
					}
				?>
			</div>
		</div>

		<div class="container">
			<?php
				if (isset($_SESSION["sesion"])) {
					?>
						<?php
							echo ($usuario->getGenero() == "masculino") ? "<h1 class='titulo'>Bienvenido a iPet</h1>" : "<h1 class='titulo'>Bienvenida a iPet</h1>";
						?>
						
						<h3 class="subtitulo-1">¡Una red social pensada en los animales!</h3>
						<h4 class="subtitulo-2">¿Qué tal el día, <?=$usuario->getNombre()?>?</h4>

						<a href="/ipet/index.php?mod=home&ope=match&usuario=<?=$usuario->getUsuario()?>" class="home-button-R"><span>Jugar Match</span></a>

					<?php
				} else {
					?>
						<h1 class="titulo">Bienvenido/a a iPet</h1>
						<h3 class="subtitulo-1">¡Una red social pensada en los animales!</h3>
						<h4 class="subtitulo-2">¿Qué deseas hacer?</h4>

						<a href="/ipet/index.php?mod=home&ope=signin" class="home-button-L"><span>Iniciar Sesión</span></a>
						<a href="/ipet/index.php?mod=home&ope=signup" class="home-button-R"><span>Registrarme</span></a>
					<?php
				}
			?>			  
		</div>
	</body>
</html>