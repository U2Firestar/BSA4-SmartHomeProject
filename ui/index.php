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

	if(is_soap_fault($resultWeek))
	{
		print(" Fehlercode: $resultWeek->faultcode | Fehlerstring: 
			 $resultWeek->faultstring");
	}
	else
	{
		var_dump($resultWeek);
		echo $resultWeek["weatherDatasetWeekReturn"][1];
		echo "<br>";
	}

	$resultNow = $soap->weatherDatasetNow(); // da kommt ein Array mit Werten zurück;

	if(is_soap_fault($resultNow))
	{
		print(" Fehlercode: $resultNow->faultcode | Fehlerstring: 
				 $resultNow->faultstring");
	}
	else
	{
		var_dump($resultNow);
		echo $resultNow["weatherDatasetNowReturn"][1];
	}
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>SmartHome - Übersicht</title>
	<?php include 'header.inc.php'; ?>
  </head>
  <body>
    <center>

      <p class='ueberschrift1'><img src='sym/weather/cloud-sun.svg'> Wetterdaten</p>
      <p class='ueberschrift2'>Aktuelles Wetter</p>
      <table align='center' border='0' width='80%' class='forecast-big'>
    		<tr>
    			<td align='center' border='1' width='25%'><img src='sym/weather/thermometer-half.svg'><br><b>23°C</b></td>
    			<td align='center' border='1' width='25%'><img src='sym/weather/air.svg'><br><b>50km/h</b></td>
          <td align='center' border='1' width='25%'><img src='sym/wind/no.svg'><br><b>NO</b></td>
    		</tr>
    	</table>

      <p class='ueberschrift2'>Wettervorhersage (7 Tage)</p>
      <table align='center' border='0' width='80%'>
    		<tr>
    			<td align='center'><b>MO</b><br>9°C<br>55km&sol;h<br><img src='sym/wind/n.svg'></td>
    			<td align='center'><b>DI</b><br>9°C<br>55km&sol;h<br><img src='sym/wind/no.svg'>
    			<td align='center'><b>MI</b><br>9°C<br>55km&sol;h<br><img src='sym/wind/o.svg'>
          <td align='center'><b>DO</b><br>9°C<br>55km&sol;h<br><img src='sym/wind/so.svg'>
          <td align='center'><b>FR</b><br>9°C<br>55km&sol;h<br><img src='sym/wind/s.svg'>
          <td align='center'><b>SA</b><br>9°C<br>55km&sol;h<br><img src='sym/wind/sw.svg'>
          <td align='center'><b>SO</b><br>9°C<br>55km&sol;h<br><img src='sym/wind/w.svg'>
    		</tr>
    	</table>

      <p class='ueberschrift1'><img src='sym/building.svg'> Gebäudesteuerung</p>
      <table align='center' border='0'>
    		<tr>
    			<td align='center' border='0' width='35%' class='button'><a href='light.php'><img src='sym/light/lightbulb.svg'><img src='sym/light/lightbulb-off.svg'><br>Licht</a></td>
          <td align='center' border='0' width='10%'></td>
    			<td align='center' border='0' width='35%' class='button'><a href='shutter.php'><img src='sym/shutter/chevron-double-up.svg'><img src='sym/shutter/chevron-double-down.svg'><br>Jalousie</a></td>
    		</tr>
    	</table>
    </center>
  </body>
</html>
