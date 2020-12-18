<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Alejandro Álvarez Varela UO271288">
    <title>Calculadora Basica</title>
    <link rel="stylesheet" href="CalculadoraBasica.css">
</head>

    <body>
      <?php

        class Calculadora {
          public $operacion;
          public $operacionMostrada;
          public $resuelto;
          public $memoria;

          public function __construct() {
            $this->operacionMostrada = "";
            $this->operacion = "";
            $this->memoria = "";
            $this->resuelto = false;
          }

          public function digitos($arg) {
            if ($this->resuelto) {
				$this->operacion = "";
              $this->operacionMostrada = "";
              $this->resuelto = false;
            }
            $this->operacionMostrada .= $arg;
            $this->operacion .= $arg;
          }

          public function punto() {
            $this->operacion .= ".";
            $this->operacionMostrada .= ".";
          }

          public function suma() {
            $this->operacion .= "+";
            $this->operacionMostrada .= "+";
          }

          public function resta() {
            $this->operacion .= "-";
            $this->operacionMostrada .= "-";
          }

          public function mult() {
            $this->operacion .= "*";
            $this->operacionMostrada .= "*";
          }

          public function div() {
            $this->operacion .= "/";
            $this->operacionMostrada .= "/";
          }

          public function igual() {
            $this->operacion = eval("return " . $this->operacion . ";");
            $this->operacionMostrada = eval("return " . $this->operacion . ";");
            $this->resuelto = true;
          }

          public function borrar() {
            $this->operacion = "";
            $this->operacionMostrada = "";
			$this->resuelto = false;
          }

          public function mMenos() {
            if (is_numeric($this->operacionMostrada)) {
              $this->memoria = eval("return " . $this->memoria . "-" . $this->operacionMostrada . ";");
            }
          }

            public function mMas() {
              if (is_numeric($this->operacionMostrada)){
                $this->memoria = eval("return " . $this->memoria . "+" . $this->operacionMostrada . ";");
              }
            }

            public function mrc() {
              $resultado = $this->memoria;
              $this->operacion = $resultado;
              $this->operacionMostrada = $resultado;
              $this->memoria = "";
            }
          }


          if(!isset( $_SESSION['calc']))  {
              $_SESSION['calc'] = new Calculadora();
          }

          if (count($_POST)>0) {
              if(isset($_POST['mrc']))
                $_SESSION['calc']->mrc();
              if(isset($_POST['mMenos']))
                $_SESSION['calc']->mMenos();
              if(isset($_POST['mMas']))
                $_SESSION['calc']->mMas();
              if(isset($_POST['div']))
                $_SESSION['calc']->div();
              if(isset($_POST['uno']))
                $_SESSION['calc']->digitos('1');
              if(isset($_POST['dos']))
                $_SESSION['calc']->digitos('2');
              if(isset($_POST['tres']))
                $_SESSION['calc']->digitos('3');
              if(isset($_POST['cuatro']))
                $_SESSION['calc']->digitos('4');
              if(isset($_POST['cinco']))
                $_SESSION['calc']->digitos('5');
              if(isset($_POST['seis']))
                $_SESSION['calc']->digitos('6');
              if(isset($_POST['siete']))
                $_SESSION['calc']->digitos('7');
              if(isset($_POST['ocho']))
                $_SESSION['calc']->digitos('8');
              if(isset($_POST['nueve']))
                $_SESSION['calc']->digitos('9');
              if(isset($_POST['cero']))
                $_SESSION['calc']->digitos('0');
              if(isset($_POST['mult']))
                $_SESSION['calc']->mult();
              if(isset($_POST['resta']))
                $_SESSION['calc']->resta();
              if(isset($_POST['suma']))
                $_SESSION['calc']->suma();
              if(isset($_POST['punto']))
                $_SESSION['calc']->punto();
              if(isset($_POST['borrar']))
                $_SESSION['calc']->borrar();
              if(isset($_POST['igual']))
                $_SESSION['calc']->igual();
            }
            echo "<h1>Calculadora Básica</h1>";
            echo '<form class="calculadora" action="CalculadoraBasica.php" method="post">';
            echo '<div><div id="resultado">';
            echo $_SESSION['calc']->operacionMostrada;
            echo "</div></div>";
            echo '
                  <div>
                      <button id="mrc" type="submit" name="mrc">mrc</button>
                      <button id="mMenos" type="submit" name="mMenos">m-</button>
                      <button id="mMas" type="submit" name="mMas">m+</button>
                      <button id="div" type="submit" name="div">/</button>
                  </div>
                  <div>
                      <button id="siete" type="submit" name="siete">7</button>
                      <button id="ocho" type="submit" name="ocho">8</button>
                      <button id="nueve" type="submit" name="nueve">9</button>
                      <button id="mult" type="submit" name="mult">*</button>
                  </div>
                  <div>
                      <button id="cuatro" type="submit" name="cuatro">4</button>
                      <button id="cinco" type="submit" name="cinco">5</button>
                      <button id="seis" type="submit" name="seis">6</button>
                      <button id="resta" type="submit" name="resta">-</button>
                  </div>
                  <div>
                      <button id="uno" type="submit" name="uno">1</button>
                      <button id="dos" type="submit" name="dos">2</button>
                      <button id="tres" type="submit" name="tres">3</button>
                      <button id="suma" type="submit" name="suma">+</button>
                  </div>
                  <div>
                      <button id="cero" type="submit" name="cero">0</button>
                      <button id="punto" type="submit" name="punto">.</button>
                      <button id="borrar" type="submit" name="borrar">C</button>
                      <button id="igual" type="submit" name="igual">=</button>

                  </div>
              </form>';
      ?>
    </body>
</html>
