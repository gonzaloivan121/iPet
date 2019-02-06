<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Mascotas - Listado de Mascotas</title>
		<meta charset="utf-8" />
	</head>
	
	<body>
		<h1>Listado de Mascotas</h1>

		<h3>
			<a href="/ipet/index.php?mod=mascota&ope=create">Añadir nueva Mascota</a>
		</h3>

		<ul>
			<?php
				if (empty($mascotas)) {
					echo "<h3>No hay ninguna mascota</h3>" ;
				}
				foreach ($mascotas as $pet):
			?>
				<li>
					<?= $pet->getNombre() ; ?> - [
					<a href="/ipet/index.php?mod=mascota&ope=update&idMascota=<?=$pet->getIdMascota()?>">editar</a> |
					<a href="/ipet/index.php?mod=mascota&ope=delete&idMascota=<?=$pet->getIdMascota()?>">borrar</a> ]
				</li>
			<?php		
				endforeach ;
			?>
		</ul>

	</body>
</html>