<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Alejandro Álvarez Varela UO271288">
    <title>Calculadora RPN</title>
    <link rel="stylesheet" type="text/css" href="CalculadoraRPN.css">
</head>

<body>
  <?php
  class PilaLIFO {

    protected $pila;
    protected $tamagnoMax;

    public function __construct($tamagnoMax = 20){
        $this->pila = array();
        $this->tamagnoMax = $tamagnoMax;
    }

    public function apilar($elemento) {
        if ($this->longitud() < $this->tamagnoMax) {
            array_unshift($this->pila, $elemento);
        } else {
            throw new RunTimeException('¡Pila llena: no hay espacio para apilar más elementos!');
        }
    }

    public function desapilar() {
        if ($this->vacia()) {
            throw new RunTimeException('¡Pila vacía! No se pueden desapilar elementos');
        } else {
            return array_shift($this->pila);
        }
    }

    public function longitud(){
         return count($this->pila);
    }

    public function vacia() {
        return empty($this->pila);
    }

    public function vaciar() {
        $this->pila = array();
    }

    public function mostrar(){
      if(!$this->vacia()){
        $stringPila = '<table>';
        $j = $this->longitud();
        foreach($this->pila as $num)
          $stringPila .= "<tr><th>" . $j-- . ":</th><td>" . $num . "</td></tr>";
        $stringPila .= "</table>";
        echo $stringPila;
      }
    }
}

class CalculadoraRPN {
    public $digitos;
    public $pila;
    public function __construct() {
        $this->digitos = "";
        $this->pila = new PilaLIFO();
    }

    public function digito($arg) {
        $this->digitos .= $arg;
    }

    public function punto() {
        $this->digitos .= ".";
    }

    public function enter() {
        if (!empty($this->digitos)) {
            $this->pila->apilar($this->digitos);
            $this->digitos = "";
        }
    }

    public function suma() {
        if ($this->pila->longitud() >= 2) {
            $a = $this->pila->desapilar();
            $b = $this->pila->desapilar();
            $c = floatval($a) + floatval($b);
            $this->pila->apilar($c);
        }
    }

    public function resta() {
        if ($this->pila->longitud() >= 2) {
            $a = $this->pila->desapilar();
            $b = $this->pila->desapilar();
            $c = floatval($b) - floatval($a);
            $this->pila->apilar($c);
        }
    }

    public function mult() {
        if ($this->pila->longitud() >= 2) {
            $a = $this->pila->desapilar();
            $b = $this->pila->desapilar();
            $c = floatval($a) * floatval($b);
            $this->pila->apilar($c);
        }
    }

    public function div() {
        if ($this->pila->longitud() >= 2) {
            $a = $this->pila->desapilar();
            $b = $this->pila->desapilar();
            $c = floatval($b) / floatval($a);
            $this->pila->apilar($c);
        }
    }

    public function x2() {
        if ($this->pila->longitud() >= 1) {
            $a = $this->pila->desapilar();
            $b = $a ** 2;
            $this->pila->apilar($b);
        }
    }

    public function sin() {
        if ($this->pila->longitud() >= 1) {
            $a = $this->pila->desapilar();
            $b = sin($a);
            $this->pila->apilar($b);

        }
    }

    public function cos() {
        if ($this->pila->longitud() >= 1) {
            $a = $this->pila->desapilar();
            $b = cos($a);
            $this->pila->apilar($b);

        }
    }

    public function tan() {
        if ($this->pila->longitud() >= 1) {
            $a = $this->pila->desapilar();
            $b = tan($a);
            $this->pila->apilar($b);

        }
    }

    public function xy() {
        if ($this->pila->longitud() >= 2) {
            $a = $this->pila->desapilar();
            $b = $this->pila->desapilar();
            $c = $b ** $a;
            $this->pila->apilar($c);

        }
    }

    public function borrar() {
        $this->pila->vaciar();

    }

    public function retroceso() {
        $str = substr($this->digitos, 0, strlen($this->digitos) - 1);
        $this->digitos = $str;
    }
}

if(!isset( $_SESSION['rpn']))  {
          $_SESSION['rpn'] = new CalculadoraRPN();
      }

if (count($_POST)>0) {
        if(isset($_POST['div']))
            $_SESSION['rpn']->div();
          if(isset($_POST['uno']))
            $_SESSION['rpn']->digito('1');
          if(isset($_POST['dos']))
            $_SESSION['rpn']->digito('2');
          if(isset($_POST['tres']))
            $_SESSION['rpn']->digito('3');
          if(isset($_POST['cuatro']))
            $_SESSION['rpn']->digito('4');
          if(isset($_POST['cinco']))
            $_SESSION['rpn']->digito('5');
          if(isset($_POST['seis']))
            $_SESSION['rpn']->digito('6');
          if(isset($_POST['siete']))
            $_SESSION['rpn']->digito('7');
          if(isset($_POST['ocho']))
            $_SESSION['rpn']->digito('8');
          if(isset($_POST['nueve']))
            $_SESSION['rpn']->digito('9');
          if(isset($_POST['cero']))
            $_SESSION['rpn']->digito('0');
          if(isset($_POST['mult']))
            $_SESSION['rpn']->mult();
          if(isset($_POST['resta']))
            $_SESSION['rpn']->resta();
          if(isset($_POST['suma']))
            $_SESSION['rpn']->suma();
          if(isset($_POST['punto']))
            $_SESSION['rpn']->punto();
          if(isset($_POST['borrar']))
            $_SESSION['rpn']->borrar();
          if(isset($_POST['x2']))
            $_SESSION['rpn']->x2();
          if(isset($_POST['xy']))
            $_SESSION['rpn']->xy();
          if(isset($_POST['sin']))
            $_SESSION['rpn']->sin();
          if(isset($_POST['cos']))
            $_SESSION['rpn']->cos();
          if(isset($_POST['tan']))
            $_SESSION['rpn']->tan();
          if(isset($_POST['retroceso']))
            $_SESSION['rpn']->retroceso();
          if(isset($_POST['enter']))
            $_SESSION['rpn']->enter();
          }
  echo '
    <h1>Calculadora RPN</h1>
    <form class="calculadora" action="CalculadoraRPN.php" method="post">
        <div id="pantalla">
            <div id="resultado">';
            echo $_SESSION["rpn"]->pila->mostrar();
            echo '</div>
            <textarea disabled title="operandos" id="textarea">';
            echo $_SESSION["rpn"]->digitos;
            echo '</textarea>
        </div>
        <div>
            <button id="x2" type="submit" name="x2">x<sup>2</sup></button>
            <button id="sin" type="submit" name="sin">sin</button>
            <button id="cos" type="submit" name="cos">cos</button>
            <button id="tan" type="submit" name="tan">tan</button>
        </div>
        <div>
            <button id="xy" type="submit" name="xy">x<sup>y</sup></button>
            <button id="borrar" type="submit" name="borrar">C</button>
            <button id="enter" type="submit" name="enter">Enter</button>
        </div>
        <div>
            <button id="siete" type="submit" name="siete">7</button>
            <button id="ocho" type="submit" name="ocho">8</button>
            <button id="nueve" type="submit" name="nueve">9</button>
            <button id="div" type="submit" name="div">&#xF7;</button>
        </div>
        <div>
            <button id="cuatro" type="submit" name="cuatro">4</button>
            <button id="cinco" type="submit" name="cinco">5</button>
            <button id="seis" type="submit" name="seis">6</button>
            <button id="mult" type="submit" name="mult">&#xD7;</button>
        </div>
        <div>
            <button id="uno" type="submit" name="uno">1</button>
            <button id="dos" type="submit" name="dos">2</button>
            <button id="tres" type="submit" name="tres">3</button>
            <button id="resta" type="submit" name="resta">-</button>
        </div>
        <div>
            <button id="cero" type="submit" name="cero">0</button>
            <button id="punto" type="submit" name="punto">.</button>
            <button id="retroceso" type="submit" name="retroceso">&#x2190;</button>
            <button id="suma" type="submit" name="suma">+</button>
        </div>
    </form>
    ';?>
</body>
</html>
