<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<title>Calculadora científica</title>
	<meta name="description" content="Calculadora científica. Ejercicio 2">
	<meta name="keywords" content="calculadora,calculo,matematicas">
	<meta name="author" content="Alejandro Álvarez Varela">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CalculadoraCientifica.css" />
</head>

<body>
	<h1>Calculadora Científica</h1>
	<?php
	class CalculadoraBasica
	{
		public $consola;
		private $memoria;

		public function __construct()
		{
			$this->consola = "";
			$this->memoria = 0;
		}
		public function getmemoria()
		{
			return $this->memoria;
		}
		public function getconsola()
		{
			return $this->consola;
		}

		public function annadirCampoConsola($value)
		{
			if ($this->getconsola() === "NaN" | $this->getconsola() === "Syntax Error" | $this->getconsola() === "Infinity") {
				$this->consola = "";
			}
			$this->consola .= $value;
		}

		public function calcular()
		{
			try {
				$this->consola = eval("return $this->consola ;");
			} catch (Exception $e) {
				$this->consola = "Syntax Error";
			}
		}

		public function memMostrar()
		{
			$this->consola .= $this->getmemoria();
			$this->memoria = 0;
		}

		public function memSum()
		{
			$this->memoria = $this->getmemoria() + eval("return $this->consola ;");
		}

		public function memSub()
		{
			$this->memoria = $this->getmemoria() - eval("return $this->consola ;");
		}

		public function delete()
		{
			$this->consola = "";
		}
	};

	class CalculadoraCientifica extends CalculadoraBasica
	{
		public function raiz()
		{
			$this->consola = sqrt(floatval($this->consola));
		}

		public function logaritmo()
		{
			$this->consola = log(floatval($this->consola));
		}

		public function seno()
		{
			$this->consola = sin(floatval($this->consola));
		}

		public function coseno()
		{
			$this->consola = cos(floatval($this->consola));
		}

		public function tangente()
		{
			$this->consola = tan(floatval($this->consola));
		}

		public function fact()
		{
			$toFact = floatVal($this->consola);
			$fact = 1;
			for ($i = 1; $i <= $toFact; $i++)
				$fact *= $i;
			$this->consola = $fact;
		}
	};

	if (!isset($_SESSION['calculadoraC']))
		$_SESSION['calculadoraC'] = new CalculadoraCientifica();
	$calculadora = $_SESSION['calculadoraC'];

	if (count($_POST) > 0) {
		if (isset($_POST['raiz']))
			$calculadora->raiz();
		elseif (isset($_POST['cuadrado']))
			$calculadora->annadirCampoConsola("**2");
		elseif (isset($_POST['pi']))
			$calculadora->annadirCampoConsola(M_PI);
		elseif (isset($_POST['fact']))
			$calculadora->fact();
		elseif (isset($_POST['sin']))
			$calculadora->seno();
		elseif (isset($_POST['cos']))
			$calculadora->coseno();
		elseif (isset($_POST['tan']))
			$calculadora->tangente();
		elseif (isset($_POST['log']))
			$calculadora->logaritmo();
		elseif (isset($_POST['mrc']))
			$calculadora->memMostrar();
		elseif (isset($_POST['m-']))
			$calculadora->memSub();
		elseif (isset($_POST['m+']))
			$calculadora->memSum();
		elseif (isset($_POST['0']))
			$calculadora->annadirCampoConsola("0");
		elseif (isset($_POST['1']))
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

	echo "<form action='CalculadoraCientifica.php' method='post' name='Calculadora'>
				<textarea disabled>$calculadora->consola</textarea>
				<button type='submit' name='raiz' >√</button>
				<button type='submit' name='cuadrado' >x^2</button>
				<button type='submit' name='pi' >π</button>
				<button type='submit' name='fact' >n!</button>
				<button type='submit' name='sin' >sin</button>
				<button type='submit' name='cos' >cos</button>
				<button type='submit' name='tan' >tan</button>
				<button type='submit' name='log' >log</button>
				<button type='submit' name='mrc' >mrc</button>
				<button type='submit' name='m-' >m-</button>
				<button type='submit' name='m+' >m+</button>
				<button type='submit'name='/' >/</button>
				<button type='submit' name='7' >7</button>
				<button type='submit' name='8' >8</button>
				<button type='submit' name='9' >9</button>
				<button type='submit' name='*' >x</button>
				<button type='submit' name='4' >4</button>
				<button type='submit' name='5' >5</button>
				<button type='submit' name='6' >6</button>
				<button type='submit' name='-' >-</button>
				<button type='submit'name='1' >1</button>
				<button type='submit' name='2' >2</button>
				<button type='submit' name='3' >3</button>
				<button type='submit' name='+' >+</button>
				<button type='submit' name='0' >0</button>
				<button type='submit' name=',' >.</button>
				<button type='submit' name='C' >C</button>
				<button type='submit' name='=' >=</button>
			</form>";
	?>
</body>

</html>