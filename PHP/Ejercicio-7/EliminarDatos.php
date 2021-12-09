<!DOCTYPE html>
<html lang="es">

<head>
	<title>Busca datos introducidos</title>
	<meta name="description" content="Gestión BBDD con PHP. Ejercicio 6">
	<meta name="keywords" content="bbdd, sql, php">
	<meta name="author" content="Alejandro Álvarez Varela">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="Ejercicio7.css" rel="stylesheet" />
</head>

<body>
	<h1>Gestión BBDD MySQL con PHP</h1>
	<h2>Menú para gestionar la BBDD:</h2>
	<nav>
		<ul>
			<li><a href="Workshop.html" title="Menú principal">Menú principal</a></li>
			<li><a href="CreaBBDD.php" title="Crear Base de Datos">Crear Base de Datos</a></li>
			<li><a href="InsertarDatos.php" title="Insertar Datos de prueba">Insertar datos</a></li>
			<li><a href="BuscarDatos.php" title="BuscarDatosTabla">Buscar datos en una tabla</a></li>
		</ul>
	</nav>
	<h1>Eliminar dato introducido</h1>
	<form id="formbase" action='#' method='post'>
		<label for="id">Id del elemento a eliminar:</label>
		<input id="id" type='text' name='id' required />
		<input type='submit' class='button' name='eliminarc' value='Eliminar cliente' />
		<input type='submit' class='button' name='eliminarv' value='Eliminar vehiculo' />
		<input type='submit' class='button' name='eliminart' value='Eliminar tipo de vehiculo' />
		<input type='submit' class='button' name='eliminarw' value='Eliminar workorder' />
	</form>
	<?php
	require('BaseDatos.php');
	$base = new BaseDatos();

	if (count($_POST) > 0)
		if (isset($_POST['eliminarc']))
			$base->borrarCliente();
	if (isset($_POST['eliminard']))
		$base->borrarVehiculo();
	if (isset($_POST['eliminarp']))
		$base->borrarTipoVehiculo();
	if (isset($_POST['eliminarw']))
		$base->borrarWorkorder();
	?>
</body>

</html>