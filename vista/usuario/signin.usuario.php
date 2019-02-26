<!DOCTYPE html>
<html>
	<head>
		<title>iPet - Inicio de Sesión</title>
		<link rel="stylesheet" type="text/css" href="/iPet/vista/css/style.css">
	</head>
	<body class="formulario">
		<div class="menu" id="menu">
			<div class="left">
				<a href="/ipet/index.php">Inicio</a>
				<a href="#">News</a>
				<a href="#">Contact</a>
				<a href="#">About</a>
			</div>
			<div class="right">
				<a href="#" class="active">Iniciar Sesión</a>
				<a href="/ipet/index.php?mod=home&ope=signup">Registrarme</a>
			</div>
		</div>
		
		<div class="container-form">
			<div id="login">
				<h3>Iniciar Sesión</h3>
				
				<form method="get" action="/ipet/index.php" name="login">
					<input type="hidden" name="mod" value="home">
					<input type="hidden" name="ope" value="signin">

					<label for="usuario">*Usuario o Email</label>
					<input type="text" name="usuario" id="usuario-login" />

					<label for="password">*Contraseña</label>
					<input type="password" name="password" id="password" />

					<input type="submit" class="button" value="Iniciar">
				</form>
			</div>
		</div>
	</body>
</html>