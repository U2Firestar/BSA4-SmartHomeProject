<!doctype html>
<?php
$soap = new SoapClient(
		null,
		array(
				"location" => "http://sedesed.ddns.net:8080/SOAP_API/services/returnMethodes",
				"uri" => "http://sedesed.ddns.net:8080/SOAP_API/services/returnMethodes",
				"soap_version" => SOAP_1_1,
				"trace" => 1
		)
);

$resultWeek = $soap->weatherDatasetWeek(); // da kommt ein Array mit Werten zurück;

if (is_soap_fault($resultWeek))
{
	print(" Fehlercode: $resultWeek->faultcode | Fehlerstring: 
			 $resultWeek->faultstring");
}
else
{
	foreach ($resultWeek["weatherDatasetWeekReturn"] as $key => $value)
	{
		$shortVal = explode(":", $value);
		$day = intdiv($key, 3);
		$weatherForcast[$day][$key % 3][0] = $shortVal[0];
		$weatherForcast[$day][$key % 3][1] = $shortVal[1];
		/*
			Mo = [0][][]
			Di = [1][][]
			Mi = [2][][]
			Do = [3][][]
			Fr = [4][][]
			Sa = [5][][]
			So = [6][][]

			Temperatur = [][0][]
			Windrichtung = [][1][]
			Windgeschwindigkeit = [][2][]

			Werte = [][][1]
		 */
	}
}

$resultNow = $soap->weatherDatasetNow(); // da kommt ein Array mit Werten zurück;
if (is_soap_fault($resultNow))
{
	print(" Fehlercode: $resultNow->faultcode | Fehlerstring: 
				 $resultNow->faultstring");
}
else
{
	foreach ($resultNow["weatherDatasetNowReturn"] as $key => $value)
	{
		$shortVal = explode(":", $value);
		$weatherToday[$key][0] = $shortVal[0];
		$weatherToday[$key][1] = $shortVal[1];
		/*
		 	Temperatur = [0][]
			Windrichtung = [1][]
			Windgeschwindigkeit = [2][]

			Werte = [][1]
		 */
	}
}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
	<title>SmartHome - Übersicht</title>
	<?php
	include 'header.inc.php'; ?>
</head>
<body>
<center>
	<?php
	echo "
	<p class='ueberschrift1'><img src='sym/weather/cloud-sun.svg'> Wetterdaten</p>
	<p class='ueberschrift2'>Aktuelles Wetter</p>
	<table align='center' border='0' width='80%' class='forecast-big'>
		<tr>
			<td align='center' border='1' width='25%'><img src='sym/weather/thermometer-half.svg'><br><b>";
	echo $weatherToday[0][1];
	echo "°C</b></td>
			<td align='center' border='1' width='25%'><img src='sym/weather/air.svg'><br><b>";
	echo $weatherToday[2][1];
	echo "km/h</b></td>
			<td align='center' border='1' width='25%'><img src='sym/wind/";
	$wind = strtolower($weatherToday[1][1]);
	echo $wind;
	echo ".svg'><br><b>";
	echo $weatherToday[1][1];
	echo "</b></td>
		</tr>
	</table>

	<p class='ueberschrift2'>Wettervorhersage (7 Tage)</p>
	<table align='center' border='0' width='80%'>
		<tr>
			<td align='center'><b>MO</b><br>";
	echo $weatherForcast[0][0][1];
	echo "°C<br>";
	echo $weatherForcast[0][2][1];
	echo "km&sol;h<br><img src='sym/wind/";
	$wind = strtolower($weatherForcast[0][1][1]);
	echo $wind;
	echo ".svg'></td>
			<td align='center'><b>DI</b><br>";
	echo $weatherForcast[1][0][1];
	echo "°C<br>";
	echo $weatherForcast[1][2][1];
	echo "km&sol;h<br><img src='sym/wind/";
	$wind = strtolower($weatherForcast[1][1][1]);
	echo $wind;
	echo ".svg'></td>
			<td align='center'><b>MI</b><br>";
	echo $weatherForcast[2][0][1];
	echo "°C<br>";
	echo $weatherForcast[2][2][1];
	echo "km&sol;h<br><img src='sym/wind/";
	$wind = strtolower($weatherForcast[2][1][1]);
	echo $wind;
	echo ".svg'></td>
			<td align='center'><b>DO</b><br>";
	echo $weatherForcast[3][0][1];
	echo "°C<br>";
	echo $weatherForcast[3][2][1];
	echo "km&sol;h<br><img src='sym/wind/";
	$wind = strtolower($weatherForcast[3][1][1]);
	echo $wind;
	echo ".svg'></td>
			<td align='center'><b>FR</b><br>";
	echo $weatherForcast[4][0][1];
	echo "°C<br>";
	echo $weatherForcast[4][2][1];
	echo "km&sol;h<br><img src='sym/wind/";
	$wind = strtolower($weatherForcast[4][1][1]);
	echo $wind;
	echo ".svg'></td>
			<td align='center'><b>SA</b><br>";
	echo $weatherForcast[5][0][1];
	echo "°C<br>";
	echo $weatherForcast[5][2][1];
	echo "km&sol;h<br><img src='sym/wind/";
	$wind = strtolower($weatherForcast[5][1][1]);
	echo $wind;
	echo ".svg'></td>
			<td align='center'><b>SO</b><br>";
	echo $weatherForcast[6][0][1];
	echo "°C<br>";
	echo $weatherForcast[6][2][1];
	echo "km&sol;h<br><img src='sym/wind/";
	$wind = strtolower($weatherForcast[6][1][1]);
	echo $wind;
	echo ".svg'></td>
		</tr>
	</table>

	<p class='ueberschrift1'><img src='sym/building.svg'> Gebäudesteuerung</p>
	<table align='center' border='0'>
		<tr>
			<td align='center' border='0' width='35%' class='button'><a href='light.php'><img
							src='sym/light/lightbulb.svg'><img src='sym/light/lightbulb-off.svg'><br>Licht</a></td>
			<td align='center' border='0' width='10%'></td>
			<td align='center' border='0' width='35%' class='button'><a href='shutter.php'><img
							src='sym/shutter/chevron-double-up.svg'><img src='sym/shutter/chevron-double-down.svg'><br>Jalousie</a>
			</td>
		</tr>
	</table>"
	?>
</center>
</body>
</html>
