<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>Crea bbdd</title>
		<meta name="description" content="Gestión BBDD con PHP. Ejercicio 7">
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
				<li><a href="InsertarDatos.php" title="Insertar Datos">Insertar datos</a></li>
				<li><a href="BuscarDatos.php" title="Buscar Datos Introducidos">Buscar datos introducidos</a></li>
				<li><a href="EliminarDatos.php" title="Eliminar Datos Introducidos">Eliminar datos introducidos</a></li>
			</ul>
		</nav> 
		<h1>Crear base de datos de nombre personal_uniovi</h1>
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
						$base->cargarDatos("centros.csv",1);
						$base->cargarDatos("departamentos.csv",2);
						$base->cargarDatos("empleados.csv",3);
					}
		?>
		<footer>
			<a href="https://validator.w3.org/check?uri=referer"><img
				src="https://www.w3.org/html/logo/badge/html5-badge-h-solo.png"
				alt="HTML5 Válido" title="HTML5 Válido" height="64" width="63" /></a>
			<a href=" http://jigsaw.w3.org/css-validator/check/referer ">
				<img src=" http://jigsaw.w3.org/css-validator/images/vcss"
				alt="Valid CSS!" height="31" width="88"/></a> 
		</footer>
	</body>
</html>