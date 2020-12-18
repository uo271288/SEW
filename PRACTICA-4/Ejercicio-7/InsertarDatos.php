<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="UTF-8"/>
		<title>Insertar datos</title>
		<meta name="author" content="Alejandro Álvarez Varela UO271288">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="Ejercicio7.css" rel="stylesheet" />
	</head>

	<body>
		<h1>Gestión BBDD MySQL con PHP</h1>
		<h2>Menú para gestionar la BBDD:</h2>
		<nav>
			<ul>
				<li><a href="CreaBBDD.php" title="Crear Base de Datos">Crear Base de Datos</a></li>
				<li><a href="BuscarDatos.php" title="Buscar Datos Introducidos">Buscar datos</a></li>
				<li><a href="EliminarDatos.php" title="Eliminar Datos Introducidos">Eliminar datos</a></li>
			</ul>
		</nav>
		<h1>Complete los datos a insertar</h1>
		<form id="formbase" action='#' method='post'>
			<h2>Alumno:</h2>
			<p>Nombre del alumno:</p>
				<input type='text' class='text' name='nombrea'/>
				<br>
			<p>Edad del alumno:</p>
				<input type='number' class='text' name='edad'/>
				<br>
			<input type='submit' class='button' name='insertara' value='Insertar datos alumno'/>
			<h2>Materia:</h2>
			<p>Nombre de la materia:</p>
				<input type='text' class='text' name='nombrem'/>
				<br>
			<p>Departamento de la materia</p>
				<input type='text' class='text' name='departamento'/>
				<br>
			<input type='submit' class='button' name='insertarm' value='Insertar datos materia'/>
			<h2>Asistencia:</h2>
			<p>Nota:</p>
				<input type='number' class='text' name='nota'/>
				<br>
			<p>Id del alumno:</p>
				<input type='text' class='text' name='idalumno'/>
				<br>
			<p>Id de la materia:</p>
				<input type='text' class='text' name='idmateria'/>
				<br>
			<input type='submit' class='button' name='insertaras' value='Insertar datos asistencia'/>
		</form>

		<?php
			require('BaseDatos.php');
			$base = new BaseDatos();

				if (count($_POST)>0) {
					if(isset($_POST['insertara']))
						$base->insertarAlumno();
					if(isset($_POST['insertarm']))
						$base->insertarMateria();
					if(isset($_POST['insertaras']))
						$base->insertarAsistencia();
				}
		?>
	</body>
</html>
