<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8"/>
		<title>Crea la base de datos</title>
		<meta name="author" content="Alejandro Álvarez Varela UO271288">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="Ejercicio7.css" rel="stylesheet" />
	</head>

	<body>
		<h1>Gestión BBDD MySQL con PHP</h1>
		<h2>Menú para gestionar la BBDD:</h2>
		<nav>
			<ul>
				<li><a href="InsertarDatos.php" title="Insertar Datos">Insertar datos</a></li>
				<li><a href="BuscarDatos.php" title="Buscar Datos Introducidos">Buscar datos</a></li>
				<li><a href="EliminarDatos.php" title="Eliminar Datos Introducidos">Eliminar datos</a></li>
			</ul>
		</nav>
		<h1>Crear base de datos de nombre curso</h1>
		<form  id="formbase" action='#' method='post'>
			<input type='submit' class='button' name='generaBase' value='Crear base de datos'/>
		</form>
		<?php
			require('BaseDatos.php');
			$base = new BaseDatos();
				if (count($_POST)>0)
					if(isset($_POST['generaBase'])) {
						$base->crearBaseDeDatos();
						$base->crearTabla();
						$base->cargarDatos("alumnos.csv",1);
						$base->cargarDatos("materias.csv",2);
						$base->cargarDatos("asistencias.csv",3);
					}
		?>
	</body>
</html>
