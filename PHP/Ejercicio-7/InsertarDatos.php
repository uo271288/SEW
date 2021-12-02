<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<title>Inserta datos en tabla de la bbdd</title>
	<meta name="description" content="Gestión BBDD con PHP. Ejercicio 6">
	<meta name="keywords" content="bbdd, sql, php">
	<meta name="author" content="Alejandro Antuña">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="Ejercicio6.css" rel="stylesheet" />
</head>

<body>
	<h1>Gestión BBDD MySQL con PHP</h1>
	<h2>Menú para gestionar la BBDD:</h2>
	<nav>
		<ul>
			<li><a href="index.html" title="Menú principal">Menú principal</a></li>
			<li><a href="CreaBBDD.php" title="Crear Base de Datos">Crear Base de Datos</a></li>
			<li><a href="BuscarDatos.php" title="Buscar Datos Introducidos">Buscar datos introducidos</a></li>
			<li><a href="EliminarDatos.php" title="Eliminar Datos Introducidos">Eliminar datos introducidos</a></li>
		</ul>
	</nav>
	<h1>Complete los datos a insertar</h1>
	<form action='#' method='post'>
		<fieldset>
			<legend>Cliente</legend>
			<label for="dni">Dni: </label>
			<input id="dni" type="text" placeholder="1234G" name="dni" required>
			<br>
			<label for="nombre">Nombre: </label>
			<input id="nombre" type="text" placeholder="Alejandro" name="nombre" required>
			<br>
			<label for="apellidos">Apellidos: </label>
			<input id="apellidos" type="text" placeholder="Álvarez Varela" name="apellidos" required>

			<button type="submit" name="insertarc">Insertar cliente</button>
		</fieldset>
		<br>
		<fieldset>
			<legend>Vehiculo</legend>
			<label for="platenumber">Matricula: </label>
			<input id="platenumber" type="text" placeholder="1234GGG" name="platenumber" required>
			<br>
			<label for="make">Marca: </label>
			<input id="make" type="text" placeholder="Seat" name="make" required>
			<br>
			<label for="model">Modelo: </label>
			<input id="model" type="text" placeholder="Ibiza" name="model" required>
			<br>
			<label for="client">Id del propietario: </label>
			<input id="client" type="number" placeholder="1" name="client" required>
			<br>
			<label for="type">Id del tipo de vehiculo: </label>
			<input id="type" type="number" placeholder="1" name="type" required>

			<button type="submit" name="insertarv">Insertar vehiculo</button>
		</fieldset>
		<br>
		<fieldset>
			<legend>Tipo de vehiculo</legend>
			<label for="typename">Nombre: </label>
			<input id="typename" type="text" placeholder="Furgoneta" name="typename" required>
			<br>
			<label for="priceperhour">Precio por hora: </label>
			<input id="priceperhour" type="number" placeholder="5.5" name="priceperhour" required>

			<button type="submit" name="insertarv">Insertar vehiculo</button>
		</fieldset>
		<br>
		<fieldset>
			<legend>Workorder</legend>
			<label for="vehicle">Id del vehiculo: </label>
			<input id="vehicle" type="number" placeholder="1" name="vehicle" required>
			<br>
			<label for="date">Fecha: </label>
			<input id="date" type="date" name="date" required>
			<br>
			<label for="description">Descripcion: </label>
			<input id="description" type="text" placeholder="Pierde aceite" name="description" required>
			<br>
			<label for="coste">Coste: </label>
			<input id="coste" type="number" placeholder="34.60" name="coste" required>

			<button type="submit" name="insertarv">Insertar vehiculo</button>
		</fieldset>
	</form>

	<?php
	require('BaseDatos.php');
	$base = new BaseDatos();

	if (count($_POST) > 0) {
		if (isset($_POST['insertarc']))
			$base->insertarCliente();
		if (isset($_POST['insertarv']))
			$base->insertarVehiculo();
		if (isset($_POST['insertart']))
			$base->insertarTipoVehiculo();
		if (isset($_POST['insertarw']))
			$base->insertarWorkorder();
	}
	?>
</body>

</html>