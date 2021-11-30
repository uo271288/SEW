<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>Calculadora básica</title>
		<meta name="description" content="Calculadora básica. Ejercicio 1">
		<meta name="keywords" content="calculadora,calculo,matematicas">
		<meta name="author" content="Alejandro Antuña">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="CalculadoraBasica.css"/>
	</head>    
	<body>
		<h1>Calculadora Básica</h1>
		<main>
			<?php
				class CalculadoraBasica {
					public $consola;
					private $memoria;
				
				public function __construct(){
					$this->consola = "";
					$this->memoria = 0;
				}
				public function getmemoria(){
					return $this->memoria;
				}
				public function getconsola(){
					return $this->consola;
				}

				public function annadirCampoConsola($value){
					if ($this->getconsola() === "NaN" | $this->getconsola() === "Syntax Error" | $this->getconsola() === "Infinity"){
						$this->consola = "";
					}        
					$this->consola .= $value;				//AÑADE A LO QUE HAY EN LA CONSOLA EL NUEVO VALOR
				}

				public function calcular(){
					try {
						$this->consola = eval("return $this->consola ;");
					} catch(Exception $e) {
						$this->consola = "Syntax Error";
					}
				}

				public function memMostrar(){
					$this->consola .= $this->getmemoria();	//AÑADE A LO QUE HAY EN LA CONSOLA EL NUEVO VALOR
					$this->memoria = 0;
				}

				public function memSum(){
					$this->memoria = $this->getmemoria() + eval("return $this->consola ;");
					$this->consola = $this->getmemoria();
				}

				public function memSub(){
					$this->memoria = $this->getmemoria() - eval("return $this->consola ;");
					$this->consola = $this->getmemoria();
				}

				public function delete(){
					$this->consola = "";
				}
			};

			if (!isset($_SESSION['calculadora']))
			  $_SESSION['calculadora']=new CalculadoraBasica();
			$calculadora = $_SESSION['calculadora'];

			if (count($_POST)>0)  {   
				if (isset($_POST['mrc']))
					$calculadora->memMostrar();
				elseif (isset($_POST['m-']))
					$calculadora->memSub();				
				elseif (isset($_POST['m+']))
					$calculadora->memSum();
				elseif(isset($_POST['0'])) 
					$calculadora->annadirCampoConsola("0"); 
				elseif(isset($_POST['1'])) 
					$calculadora->annadirCampoConsola("1"); 
				elseif (isset($_POST['2']))
					$calculadora->annadirCampoConsola("2"); 
				elseif (isset($_POST['3']))
					$calculadora->annadirCampoConsola("3");
				elseif (isset($_POST['4']))
					$calculadora->annadirCampoConsola("4");
				elseif (isset($_POST['5']))
					$calculadora->annadirCampoConsola("5");
				elseif (isset($_POST['6']))
					$calculadora->annadirCampoConsola("6");
				elseif (isset($_POST['7']))
					$calculadora->annadirCampoConsola("7");
				elseif (isset($_POST['8']))
					$calculadora->annadirCampoConsola("8");
				elseif (isset($_POST['9']))
					$calculadora->annadirCampoConsola("9");
				elseif (isset($_POST['/']))
					$calculadora->annadirCampoConsola("/");
				else if (isset($_POST['*']))
					$calculadora->annadirCampoConsola("*");
				elseif (isset($_POST['+']))
					$calculadora->annadirCampoConsola("+");
				elseif (isset($_POST['-']))
					$calculadora->annadirCampoConsola("-");
				elseif (isset($_POST['C']))
					$calculadora->delete();
				elseif (isset($_POST[',']))
					$calculadora->annadirCampoConsola(".");
				elseif (isset($_POST['=']))
					$calculadora->calcular();
			};

			echo "<form action='#' method='post' name='Calculadora'>
				<input type='text' id='resultado' name='expresion' value='$calculadora->consola' readonly/>
				<input type='submit' class='button' name='mrc' value='MRC'/>
				<input type='submit' class='button' name='m-' value='M-'/>
				<input type='submit' class='button' name='m+' value='M+'/>
				<input type='submit' class='button' name='/' value='/'/>
				<input type='submit' class='button' name='7' value='7'/>
				<input type='submit' class='button' name='8' value='8'/>
				<input type='submit' class='button' name='9' value='9'/>
				<input type='submit' class='button' name='*' value='x'/>
				<input type='submit' class='button' name='4' value='4'/>
				<input type='submit' class='button' name='5' value='5'/>
				<input type='submit' class='button' name='6' value='6'/>
				<input type='submit' class='button' name='-' value='-'/>
				<input type='submit' class='button' name='1' value='1'/>
				<input type='submit' class='button' name='2' value='2'/>
				<input type='submit' class='button' name='3' value='3'/>
				<input type='submit' class='button' name='+' value='+'/>
				<input type='submit' class='button' name='0' value='0'/>
				<input type='submit' class='button' name=',' value='.'/>
				<input type='submit' class='button' name='C' value='C'/>
				<input type='submit' class='button' name='=' value='='/>
			</form>";
			?>
		</main>
	</body>
</html>