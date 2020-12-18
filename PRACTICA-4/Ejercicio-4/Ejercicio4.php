<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width">
    <meta name="author" content="Alejandro Álvarez Varela UO271288">
    <title>Ejercicio4</title>
    <link rel="stylesheet" type="text/css" href="Ejercicio4.css" />
</head>

<body>
    <?php
    class Converter{
      public function convertCurrency($amount,$from_currency,$to_currency){
        $apikey = 'a0252d8be6d130f52dc9';
        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";
        $json = file_get_contents("https://free.currconv.com/api/v7/convert?q=".$query."&compact=ultra&apiKey=a0252d8be6d130f52dc9");
        $obj = json_decode($json, true);
        $val = floatval($obj["$query"]);
        $total = $val * $amount;
          
          
        $string = '<table><tr><th>Conversion</th><th>Valor</th></tr>';
        $string .= "<tr><td>" . $query . "</td><td>" . number_format($total, 2, '.', '') . "</td></tr>";
        $string .= "</table>";
        return $string;
      }
    }
    
    $converter = new Converter();
    echo '<h1>Cambio de divisa <a href="https://www.currencyconverterapi.com">Currency converter</a></h1>
    <form action="Ejercicio4.php" method="post">
        <button id="EUR_USD" type="submit" name="EUR_USD">Euro a Dólar estadounidense</button>
        <button id="EUR_PHP" type="submit" name="EUR_PHP">Euro a Peso filipino</button>
        <button id="EUR_AED" type="submit" name="EUR_AED">Euro a Dirham de los Emiratos Árabes Unidos</button>
        <button id="EUR_AFN" type="submit" name="EUR_AFN">Euro a Afgani afgano</button>
        <button id="EUR_ZAR" type="submit" name="EUR_ZAR">Euro a Rand sudafricano</button>
        <button id="EUR_MRO" type="submit" name="EUR_MRO">Euro a Uguiya mauritana</button>
    </form>';
    
    if (count($_POST)>0) {
        if (isset($_POST['EUR_USD']))
            echo $converter->convertCurrency(1, 'EUR', 'USD');
        if (isset($_POST['EUR_PHP']))
            echo $converter->convertCurrency(1, 'EUR', 'PHP');
        if (isset($_POST['EUR_AED']))
            echo $converter->convertCurrency(1, 'EUR', 'AED');
        if (isset($_POST['EUR_AFN']))
            echo $converter->convertCurrency(1, 'EUR', 'AFN');
        if (isset($_POST['EUR_ZAR']))
            echo $converter->convertCurrency(1, 'EUR', 'ZAR');
        if (isset($_POST['EUR_MRO']))
            echo $converter->convertCurrency(1, 'EUR', 'MRO');
    }
    ?>
</body>

</html>
