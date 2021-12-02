<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<title>Busca datos introducidos</title>
	<meta name="description" content="Gestión BBDD con PHP. Ejercicio 6">
	<meta name="keywords" content="bbdd, sql, php">
	<meta name="author" content="Alejandro Álvarez Varela">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="Ejercicio6.css" rel="stylesheet" />
</head>

<body>
	<h1>Gestión BBDD MySQL con PHP</h1>
	<h2>Menú para gestionar la BBDD:</h2>
	<nav>
		<ul>
			<li><a href="Workshop.html" title="Menú principal">Menú principal</a></li>
			<li><a href="InsertarDatos.php" title="Insertar Datos">Insertar datos</a></li>
			<li><a href="BuscarDatos.php" title="Buscar Datos Introducidos">Buscar datos introducidos</a></li>
			<li><a href="EliminarDatos.php" title="Eliminar Datos Introducidos">Eliminar datos introducidos</a></li>
		</ul>
	</nav>
	<h1>Crear base de datos de nombre personal_uniovi</h1>
	<form action='#' method='post'>
		<input type='submit' name='generaBase' value='Crear base de datos' />
	</form>
	<?php
	require('BaseDatos.php');
	$base = new BaseDatos();
	if (count($_POST) > 0)
		if (isset($_POST['generaBase'])) {
			$base->crearBaseDeDatos();
			$base->crearTabla();
			$base->cargarDatos("clientes.csv", 1);
			$base->cargarDatos("tiposvehiculo.csv", 3);
			$base->cargarDatos("vehiculos.csv", 2);
			$base->cargarDatos("workorders.csv", 4);
		}
	?>
</body>

</html>