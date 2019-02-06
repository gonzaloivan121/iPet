<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Usuarios - Listado de Usuarios</title>
		<meta charset="utf-8" />
	</head>
	
	<body>
		<h1>Listado de Usuarios</h1>

		<h3>
			<a href="/ipet/index.php?mod=usuario&ope=create">Crear nuevo Usuario</a>
		</h3>

		<ul>
			<?php
				if (empty($usuarios)) {
					echo "<h3>No hay ningún usuario</h3>" ;
				}
				foreach ($usuarios as $user):
			?>
				<li>
					<?= $user->getNombre() ; ?> - [
					<a href="/ipet/index.php?mod=mascota&ope=index&usuario=<?=$user->getUsuario()?>">ver mascotas</a> |
					<a href="/ipet/index.php?mod=usuario&ope=update&usuario=<?=$user->getUsuario()?>">editar</a> |
					<a href="/ipet/index.php?mod=usuario&ope=delete&usuario=<?=$user->getUsuario()?>">borrar</a> ]
				</li>
			<?php		
				endforeach ;
			?>
		</ul>

	</body>
</html>