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
			<li><a href="Workshop.html" title="Menú principal">Menú principal</a></li>
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
			<input id="dni" type="text" placeholder="1234G" name="dni" >
			<br>
			<label for="clientname">Nombre: </label>
			<input id="clientname" type="text" placeholder="Alejandro" name="clientname" >
			<br>
			<label for="clientsurname">Apellidos: </label>
			<input id="clientsurname" type="text" placeholder="Álvarez Varela" name="clientsurname" >

			<button type="submit" name="insertarc">Insertar cliente</button>
		</fieldset>
		<br>
		<fieldset>
			<legend>Vehiculo</legend>
			<label for="platenumber">Matricula: </label>
			<input id="platenumber" type="text" placeholder="1234GGG" name="platenumber" >
			<br>
			<label for="make">Marca: </label>
			<input id="make" type="text" placeholder="Seat" name="make" >
			<br>
			<label for="model">Modelo: </label>
			<input id="model" type="text" placeholder="Ibiza" name="model" >
			<br>
			<label for="client_id">Id del propietario: </label>
			<input id="client_id" type="number" placeholder="1" name="client_id" >
			<br>
			<label for="vehicletype_id">Id del tipo de vehiculo: </label>
			<input id="vehicletype_id" type="number" placeholder="1" name="vehicletype_id" >

			<button type="submit" name="insertarv">Insertar vehiculo</button>
		</fieldset>
		<br>
		<fieldset>
			<legend>Tipo de vehiculo</legend>
			<label for="typename">Nombre: </label>
			<input id="typename" type="text" placeholder="Furgoneta" name="typename" >
			<br>
			<label for="priceperhour">Precio por hora: </label>
			<input id="priceperhour" type="number" step="0.01" placeholder="5.5" name="priceperhour" >

			<button type="submit" name="insertart">Insertar tipo de vehiculo</button>
		</fieldset>
		<br>
		<fieldset>
			<legend>Workorder</legend>
			<label for="vehicle_id">Id del vehiculo: </label>
			<input id="vehicle_id" type="number" placeholder="1" name="vehicle_id" >
			<br>
			<label for="workdate">Fecha: </label>
			<input id="workdate" type="date" name="workdate" >
			<br>
			<label for="workorderdescription">Descripcion: </label>
			<input id="workorderdescription" type="text" placeholder="Pierde aceite" name="workorderdescription" >
			<br>
			<label for="amount">Coste: </label>
			<input id="amount" type="number" step="0.01" placeholder="34.60" name="amount" >

			<button type="submit" name="insertarw">Insertar workorder</button>
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