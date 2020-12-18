<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8"/>
		<title>Actualizar</title>
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
				<li><a href="Eliminar.php" title="Eliminar Datos Introducidos">Eliminar datos</a></li>
				<li><a href="GenerarInforme.php" title="Generar informe de datos">Generar informe</a></li>
				<li><a href="Cargar.php" title="Cargar datos desde archivo local">Cargar datos desde archivo local</a></li>
				<li><a href="Exportar.php" title="Exportar datos a fichero">Exportar datos a fichero</a></li>
			</ul>
		</nav>
		<h1>Actualizar datos introducidos en PruebasUsabilidad</h1>
		<form id="formbase" action='#' method='post'>
			<p>Id del dato a actualizar:</p>
				<input type='text' class='text' name='id'/>
				<br>
			<p>Datos del usuario</p>
			<p>Nombre del usuario:</p>
			<input type='text' class='text' name='nombre'/>
			<p>Apellidos del usuario:</p>
			<input type='text' class='text' name='apellidos'/>
			<p>Email del usuario:</p>
			<input type='text' class='text' name='email'/>
			<p>Telefono del usuario:</p>
			<input type='number' class='text' name='telefono'/>
			<p>Edad del usuario:</p>
				<input type='number' class='text' name='edad'/>
				<br>
			<p>Sexo del usuario:</p>
				<select name="sexo">
					<option value="hombre">Hombre</option>
					<option value="mujer">Mujer</option>
				</select>
				<br>
			<p>Datos de la prueba</p>
			<p>¿Prueba realizada correctamente?:</p>
				<input type='text' class='text' name='esCorrecta'/>
				<br>
			<p>Tiempo empleado en realizar la prueba:</p>
				<input type='number' class='text' name='tiempo'/>
				<br>
			<p>Pericia demostrada:</p>
				<select name="pericia">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
				<br>
			<p>Aspectos sobre la aplicación probada</p>
			<p>Valoración de la aplicación:</p>
				<select name="valoracion">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
				<br>
			<p>Propuestas de mejora de la aplicación:</p>
				<input type='text' class='text' name='propuestas'/>
				<br>
			<p>Comentarios extras:</p>
				<input type='text' class='text' name='comentarios'/>
				<br>
			<input type='submit' class='button' name='modificar' value='Actualizar datos'/>
		</form>
		<?php
			require('Ejercicio6.php');
			$base = new BaseDatos();

			if (count($_POST)>0)
				if(isset($_POST['modificar']))
					$base->actualizarDatos();
		?>
	</body>
</html>
