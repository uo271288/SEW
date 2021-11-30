<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>Actualizar datos introducidos</title>
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
				<li><a href="Ejercicio6.html" title="Menú principal">Menú principal</a></li>
				<li><a href="CreaBBDD.php" title="Crear Base de Datos">Crear Base de Datos</a></li>
				<li><a href="CreaTabla.php" title="Crear Tabla">Crear una tabla</a></li>
				<li><a href="InsertarDatos.php" title="Insertar Datos de prueba de usabilidad">Insertar datos de prueba de usabilidad</a></li>
				<li><a href="BuscarDatos.php" title="BuscarDatosTabla">Buscar datos en una tabla</a></li>
				<li><a href="EliminarDatos.php" title="Eliminar Datos Introducidos">Eliminar datos introducidos</a></li>
				<li><a href="GenerarInforme.php" title="Generar informe de datos">Generar informe de datos</a></li>
				<li><a href="CargarDatos.php" title="Cargar datos desde archivo local">Cargar datos desde archivo local</a></li>
				<li><a href="ExportarDatos.php" title="Exportar datos a fichero">Exportar datos a fichero</a></li>
			</ul>
		</nav> 
		<h1>Actualizar datos introducidos en pruebas_usabilidad</h1>   
		<form id="formbase" action='#' method='post'>
			Id del dato a actualizar: 
				<input type='text' class='text' name='id'/>
				<br>
			<p>Datos del usuario</p>
			Edad del usuario: 
				<input type='text' class='text' name='edad'/>
				<br>
			Sexo del usuario: 
				<select name="sexo">
					<option value="hombre">Hombre</option>
					<option value="mujer">Mujer</option>
				</select>
				<br>
			<p>Datos de la prueba</p>
			¿Prueba realizada correctamente?:
				<input type='text' class='text' name='correcta'/>
				<br>
			Tiempo empleado en realizar la prueba:
				<input type='text' class='text' name='tiempo'/>
				<br>
			Pericia demostrada: 
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
			Valoración de la aplicación: 
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
			Propuestas de mejora de la aplicación: 
				<input type='text' class='text' name='propuestas'/>
				<br>			
			Comentarios extras: 
				<input type='text' class='text' name='comentarios'/>
				<br>
			<input type='submit' class='button' name='modificar' value='Actualizar'/>
		</form>
		<?php
			require('BaseDatos.php');
			$base = new BaseDatos();

			if (count($_POST)>0)   
				if(isset($_POST['modificar']))                 
					$base->actualizarDatos(); 
		?>    
	</body>
</html>