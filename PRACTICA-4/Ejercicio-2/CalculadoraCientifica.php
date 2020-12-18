<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Alejandro Álvarez Varela UO271288">
    <title>Calculadora Cientifica</title>
    <link rel="stylesheet" type="text/css" href="CalculadoraCientifica.css">
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

    class CalculadoraCientifica extends Calculadora {
      public function mc() {
        $this->memoria = "";
      }

      public function mr() {
        $this->operacion = $this->memoria;
        $this->operacionMostrada = $this->memoria;
      }

      public function ms() {
        if (is_numeric($this->operacionMostrada))
            $this->memoria = $this->operacionMostrada;
      }

      public function x2() {
        $this->operacion .= "**2";
        $this->operacionMostrada .= "^2";
      }

      public function xy() {
        $this->operacion .= "**";
        $this->operacionMostrada .= "^";
      }

    public function sin() {
        $this->operacion .= "sin(";
        $this->operacionMostrada .= "sin(";
    }

    public function cos() {
        $this->operacion .= "cos(";
        $this->operacionMostrada .= "cos(";
    }

    public function tan() {
        $this->operacion .= "tan(";
        $this->operacionMostrada .= "tan(";
    }

    public function sqrt() {
        $this->operacion .= "sqrt(";
        $this->operacionMostrada .= "√(";
    }

    public function e10x() {
        $this->operacion .= "10**";
        $this->operacionMostrada .= "10^";
    }

    public function log10() {
        $this->operacion .= "log10(";
        $this->operacionMostrada .= "log(";
    }

    public function ex() {
        $this->operacion .= "exp(1)**";
        $this->operacionMostrada .= "e^";

    }

    public function mod() {
        $this->operacion .= "%";
        $this->operacionMostrada .= " Mod ";

    }

    public function pi() {
        $this->operacion .= pi();
        $this->operacionMostrada .= "π";

    }

    public function e() {
        $this->operacion .= exp(1);
        $this->operacionMostrada .= "e";

    }

    public function abs() {
        $this->operacion .= "abs(";
        $this->operacionMostrada .= "abs(";

    }

    public function acos() {
        $this->operacion .= "acos(";
        $this->operacionMostrada .= "acos(";

    }

    public function ln() {
        $this->operacion .= "log(";
        $this->operacionMostrada .= "ln(";

    }

    public function pr() {
        $this->operacion .= ")";
        $this->operacionMostrada .= ")";

    }

    public function pl() {
        $this->operacion .= "(";
        $this->operacionMostrada .= "(";

    }

    public function retroceso() {
        $str = substr($this->operacion,0, strlen($this->operacion) - 1);
        $this->operacion = $str;
        $str = substr($this->operacionMostrada,0, strlen($this->operacionMostrada) - 1);
        $this->operacionMostrada = $str;
    }
}

      if(!isset( $_SESSION['c']))  {
          $_SESSION['c'] = new CalculadoraCientifica();
      }

      if (count($_POST)>0) {
          if(isset($_POST['mMenos']))
            $_SESSION['c']->mMenos();
          if(isset($_POST['mMas']))
            $_SESSION['c']->mMas();
          if(isset($_POST['div']))
            $_SESSION['c']->div();
          if(isset($_POST['uno']))
            $_SESSION['c']->digitos('1');
          if(isset($_POST['dos']))
            $_SESSION['c']->digitos('2');
          if(isset($_POST['tres']))
            $_SESSION['c']->digitos('3');
          if(isset($_POST['cuatro']))
            $_SESSION['c']->digitos('4');
          if(isset($_POST['cinco']))
            $_SESSION['c']->digitos('5');
          if(isset($_POST['seis']))
            $_SESSION['c']->digitos('6');
          if(isset($_POST['siete']))
            $_SESSION['c']->digitos('7');
          if(isset($_POST['ocho']))
            $_SESSION['c']->digitos('8');
          if(isset($_POST['nueve']))
            $_SESSION['c']->digitos('9');
          if(isset($_POST['cero']))
            $_SESSION['c']->digitos('0');
          if(isset($_POST['mult']))
            $_SESSION['c']->mult();
          if(isset($_POST['resta']))
            $_SESSION['c']->resta();
          if(isset($_POST['suma']))
            $_SESSION['c']->suma();
          if(isset($_POST['punto']))
            $_SESSION['c']->punto();
          if(isset($_POST['borrar']))
            $_SESSION['c']->borrar();
          if(isset($_POST['igual']))
            $_SESSION['c']->igual();

            if(isset($_POST['mc']))
              $_SESSION['c']->mc();
            if(isset($_POST['mr']))
              $_SESSION['c']->mr();
            if(isset($_POST['ms']))
              $_SESSION['c']->ms();
            if(isset($_POST['x2']))
              $_SESSION['c']->x2();
            if(isset($_POST['xy']))
              $_SESSION['c']->xy();
            if(isset($_POST['sin']))
              $_SESSION['c']->sin();
            if(isset($_POST['cos']))
              $_SESSION['c']->cos();
            if(isset($_POST['tan']))
              $_SESSION['c']->tan();
            if(isset($_POST['sqrt']))
              $_SESSION['c']->sqrt();

              if(isset($_POST['e10x']))
                $_SESSION['c']->e10x();
              if(isset($_POST['log10']))
                $_SESSION['c']->log10();
              if(isset($_POST['ex']))
                $_SESSION['c']->ex();
              if(isset($_POST['mod']))
                $_SESSION['c']->mod();
              if(isset($_POST['pi']))
                $_SESSION['c']->pi();
              if(isset($_POST['e']))
                $_SESSION['c']->e();
              if(isset($_POST['retroceso']))
                $_SESSION['c']->retroceso();
              if(isset($_POST['abs']))
                $_SESSION['c']->abs();
              if(isset($_POST['acos']))
                $_SESSION['c']->acos();

                if(isset($_POST['ln']))
                  $_SESSION['c']->ln();
                if(isset($_POST['pl']))
                  $_SESSION['c']->pl();
                if(isset($_POST['pr']))
                  $_SESSION['c']->pr();
        }
        echo '<h1>Calculadora Científica</h1><form class="calculadora" action="CalculadoraCientifica.php" method="post"><div><div id="resultado">';
        echo $_SESSION['c']->operacionMostrada;
        echo '</div></div>
        <div>
            <button id="mc" type="submit" name="mc">mc</button>
            <button id="mr" type="submit" name="mr">mr</button>
            <button id="mMas" type="submit" name="mMas">m+</button>
            <button id="mMenos" type="submit" name="mMenos">m-</button>
            <button id="ms" type="submit" name="ms">ms</button>
        </div>
        <div>
            <button id="x2" type="submit" name="x2">x<sup>2</sup></button>
            <button id="xy" type="submit" name="xy">x<sup>y</sup></button>
            <button id="sin" type="submit" name="sin">sin</button>
            <button id="cos" type="submit" name="cos">cos</button>
            <button id="tan" type="submit" name="tan">tan</button>
        </div>
        <div>
            <button id="sqrt" type="submit" name="sqrt">&#x221A;</button>
            <button id="e10x" type="submit" name="e10x">10<sup>x</sup></button>
            <button id="log10" type="submit" name="log10">log<sub>10</sub></button>
            <button id="ex" type="submit" name="ex">e<sup>x</sup></button>
            <button id="cbrt" type="submit" name="acos">acos</button>
        </div>
        <div>
            <button id="pi" type="submit" name="pi">&#x3C0;</button>
            <button id="e" type="submit" name="e">e</button>
            <button id="borrar" type="submit" name="borrar">C</button>
            <button id="retroceso" type="submit" name="retroceso">&#x2190;</button>
            <button id="div" type="submit" name="div">&#xF7;</button>
        </div>
        <div>
            <button id="abs" type="submit" name="abs">|x|</button>
            <button id="siete" type="submit" name="siete">7</button>
            <button id="ocho" type="submit" name="ocho">8</button>
            <button id="nueve" type="submit" name="nueve">9</button>
            <button id="mult" type="submit" name="mult">&#xD7;</button>
        </div>
        <div>
            <button id="mod" type="submit" name="mod">mod</button>
            <button id="cuatro" type="submit" name="cuatro">4</button>
            <button id="cinco" type="submit" name="cinco">5</button>
            <button id="seis" type="submit" name="seis">6</button>
            <button id="resta" type="submit" name="resta">-</button>
        </div>
        <div>
            <button id="ln" type="submit" name="ln">ln</button>
            <button id="uno" type="submit" name="uno">1</button>
            <button id="dos" type="submit" name="dos">2</button>
            <button id="tres" type="submit" name="tres">3</button>
            <button id="suma" type="submit" name="suma">+</button>
        </div>
        <div>
            <button id="pl" type="submit" name="pl">(</button>
            <button id="pr" type="submit" name="pr">)</button>
            <button id="cero" type="submit" name="cero">0</button>
            <button id="punto" type="submit" name="punto">.</button>
            <button id="igual" type="submit" name="igual">=</button>
        </div>
    </form>
    ';
    ?>
</body>

</html>
