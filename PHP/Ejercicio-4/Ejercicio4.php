<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<title>Ejercicio 4</title>
	<meta name="description" content="Datos del precio del cobre. Ejercicio 3">
	<meta name="keywords" content="cobre,api,precio,dolar,euro">
	<meta name="author" content="Alejandro Álvarez Varela">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Ejercicio4.css">
</head>

<body>
	<h1>Datos del precio del cobre <a href="https://metals-api.com">Metals-api</a></h1>
	<section>
		<h2>Código fuente PHP</h2>
		<main>
			<?php
			$endpoint = 'latest';
			$access_key = 'o5wmw3144wt0xmfb5j1013om0n12288c33oe7173m61kte8d4x8oeq4pmfxh';
			$ch = curl_init('https://metals-api.com/api/' . $endpoint . '?access_key=' . $access_key . '');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$json = curl_exec($ch);
			curl_close($ch);
			$exchangeRates = json_decode($json, true);
			echo "<table>
				<tr>
					<th>Moneda</th>
					<th>Precio</th>
				</tr>
				<tr>
					<td>USD</td>
					<td>" . $exchangeRates['rates']['USD'] . "$</td>
				</tr>
				<tr>
					<td>EUR</td>
					<td>" . $exchangeRates['rates']['EUR'] . "€</td>
				</tr>
				<tr>
					<td>JPY</td>
					<td>" . $exchangeRates['rates']['JPY'] . "¥</td>
				</tr>
				<tr>
					<td>GBP</td>
					<td>" . $exchangeRates['rates']['GBP'] . "£</td>
				</tr>
				<tr>
					<td>AUD</td>
					<td>" . $exchangeRates['rates']['AUD'] . "$</td>
				</tr>
				<tr>
					<td>CAD</td>
					<td>" . $exchangeRates['rates']['CAD'] . "$</td>
				</tr>
			  </table";
			?>
		</main>
</body>

</html>