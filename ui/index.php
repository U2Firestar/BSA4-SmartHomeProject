<!doctype html>
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
    			<td align='center'><b>MO</b><br><img src='sym/weather/conditions/cloudy.svg'><br>9°C</td>
    			<td align='center'><b>DI</b><br><img src='sym/weather/conditions/rain.svg'><br>9°C</td>
    			<td align='center'><b>MI</b><br><img src='sym/weather/conditions/snow.svg'><br>9°C</td>
          <td align='center'><b>DO</b><br><img src='sym/weather/conditions/snow.svg'><br>9°C</td>
          <td align='center'><b>FR</b><br><img src='sym/weather/conditions/sun.svg'><br>9°C</td>
          <td align='center'><b>SA</b><br><img src='sym/weather/conditions/sun.svg'><br>9°C</td>
          <td align='center'><b>SO</b><br><img src='sym/weather/conditions/storm.svg'><br>9°C</td>
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
