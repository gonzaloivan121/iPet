<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Mascotas - Listado de Mascotas</title>
		<meta charset="utf-8" />
	</head>
	
	<body>
		<h1>Listado de Mascotas</h1>
		<?php
			if (isset($_GET["usuario"])) {
				$usu = Usuario::getUser($_GET["usuario"]) ;
				echo "<h2>Mascotas de: ".$usu->getNombre()."</h2>" ;
			} else {
				echo "<h2>Todas las mascotas</h2>" ;
			}
		?>
		<h3>
			<a href="/ipet/index.php?mod=mascota&ope=create&usuario=<?=$_GET["usuario"]?>">Añadir nueva Mascota</a>
		</h3>

		<ul>
			<?php
				if (empty($mascotas)) {
					echo "<h3>No hay ninguna mascota</h3>" ;
				}

				foreach ($mascotas as $pet) {
					if (isset($_GET["usuario"])) {
						?>
							<li>
								<?= $pet->getNombre() ; ?> - [
								<a href="/ipet/index.php?mod=mascota&ope=update&idMascota=<?=$pet->getIdMascota()?>">editar</a> |
								<a href="/ipet/index.php?mod=mascota&ope=delete&idMascota=<?=$pet->getIdMascota()?>">borrar</a> ]
							</li>
						<?php
					} else {
						?>
							<li>
								<?= $pet->getNombre() ; ?> (<?= $pet->getUsuario() ; ?>) - [
								<a href="/ipet/index.php?mod=mascota&ope=update&idMascota=<?=$pet->getIdMascota()?>">editar</a> |
								<a href="/ipet/index.php?mod=mascota&ope=delete&idMascota=<?=$pet->getIdMascota()?>">borrar</a> ]
							</li>
						<?php
					} // end if
				} // end foreach
			?>
		</ul>

		<h3>
			<a href="/ipet/index.php?mod=usuario&ope=index">Volver atrás</a>
		</h3>
	</body>
</html>