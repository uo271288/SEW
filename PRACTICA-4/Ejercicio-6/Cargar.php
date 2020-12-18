<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8"/>
		<title>Cargar</title>
		<meta name="author" content="Alejandro Álvarez Varela UO271288">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="Ejercicio6.css" />
	</head>

	<body>
		<h1>Gestión BBDD MySQL con PHP</h1>
		<h2>Menú para gestionar la BBDD:</h2>
		<nav>
			<ul>
				<li><a href="CrearBBDD.php" title="Crear Base de Datos">Crear Base de Datos</a></li>
				<li><a href="CrearTabla.php" title="Crear Tabla">Crear una tabla</a></li>
				<li><a href="Insertar.php" title="Insertar Datos de prueba de usabilidad">Insertar datos</a></li>
				<li><a href="Buscar.php" title="Buscar Datos Introducidos">Buscar datos</a></li>
				<li><a href="Actualizar.php" title="Actualizar Datos Introducidos">Actualizar datos</a></li>
				<li><a href="Eliminar.php" title="Eliminar Datos Introducidos">Eliminar datos</a></li>
				<li><a href="GenerarInforme.php" title="Generar informe de datos">Generar informe</a></li>
				<li><a href="Exportar.php" title="Exportar datos a fichero">Exportar datos a fichero</a></li>
			</ul>
		</nav>
		<h1>Cargar datos desde un csv local</h1>
		<form id="formbase" action='#' method='post'>
			<input type='submit' class='button' name='cargar' value='Cargar datos'/>
		</form>
		<?php
			require('Ejercicio6.php');
			$base = new BaseDatos();

			if (count($_POST)>0)
				if(isset($_POST['cargar']))
					$base->cargarDatos();
		?>
	</body>
</html>
