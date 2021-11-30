<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
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
		<form id="formbase" action='#' method='post'>
			<p>CENTRO:</p>
			Nombre del centro: 
				<input type='text' class='text' name='nombrec'/>
				<br>
			Ubicación del centro
				<input type='text' class='text' name='ubicacionc'/>
				<br>			
			<input type='submit' class='button' name='insertarc' value='Insertar datos centro'/>
			<p>DEPARTAMENTO</p>
			Nombre del departamento: 
				<input type='text' class='text' name='nombred'/>
				<br>
			Ubicación del departamento
				<input type='text' class='text' name='ubicaciond'/>
				<br>			
			<input type='submit' class='button' name='insertard' value='Insertar datos departamento'/>
			<p>DOCENTE</p>
			Nombre del docente: 
				<input type='text' class='text' name='nombrep'/>
				<br>
			Apellidos del docente: 
				<input type='text' class='text' name='apellidosp'/>
				<br>
			Dni del docente: 
				<input type='text' class='text' name='dnip'/>
				<br>		
			Edad del docente: 
				<input type='text' class='text' name='edadp'/>
				<br>			
			Sexo del docente: 
				<input type='text' class='text' name='sexop'/>
				<br>	
			Departamento asociado
				<input type='text' class='text' name='dptop'/>
				<br>
			Centro en el que imparte
				<input type='text' class='text' name='centrop'/>
				<br>					
			<input type='submit' class='button' name='insertarp' value='Insertar datos docente'/>
		</form>
		
		<?php
			require('BaseDatos.php');
			$base = new BaseDatos();

				if (count($_POST)>0) {
					if(isset($_POST['insertarc']))                 
						$base->insertarCentro();
					if(isset($_POST['insertard']))                 
						$base->insertarDepartamento(); 
					if(isset($_POST['insertarp']))                 
						$base->insertarDocente(); 					
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