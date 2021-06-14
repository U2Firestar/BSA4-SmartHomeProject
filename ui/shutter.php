<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>SmartHome - Licht</title>
	<?php include 'header.inc.php'; ?>
  </head>
  <body>
    <center>

      <p class='ueberschrift1'><img src='sym/toggle-on.svg'> Jalousiesteuerung</p>
      <p class='ueberschrift2'>Einzelsteuerung</p>
      <table align='center' border='0' width='80%' class='control'>
    		<tr>
    			<td align='center' border='1' width='5%'><img src='sym/shutter/caret-down-square-fill.svg'></td>
    			<td align='center' border='1' width='45%'>Schlafzimmer</td>
          <td align='center' border='1' width='5%'>70%</td>
          <td align='center' border='1' width='5%'><img src='sym/trash.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/shutter/chevron-down.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/shutter/chevron-up.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/shutter/chevron-double-down.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/shutter/chevron-double-up.svg'></td>
    		</tr>
        <tr>
    			<td align='center' border='1' width='5%'><img src='sym/shutter/caret-up-square.svg'></td>
    			<td align='center' border='1' width='45%'>B&uuml;ro</td>
          <td align='center' border='1' width='5%'>0%</td>
          <td align='center' border='1' width='5%'><img src='sym/trash.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/shutter/chevron-down.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/shutter/chevron-up.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/shutter/chevron-double-down.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/shutter/chevron-double-up.svg'></td>
    		</tr>
    	</table>

      <p class='ueberschrift2'>Mastersteuerung</p>
      <table align='center' border='0'>
    		<tr>
    			<td align='center' border='0' width='35%' class='button'><a href='light.php'><img src='sym/shutter/chevron-double-up.svg'><br>Alle HOCH</a></td>
          <td align='center' border='0' width='5%'></td>
    			<td align='center' border='0' width='35%' class='button'><a href='shutter.php'><img src='sym/shutter/chevron-double-down.svg'><br>Alle RUNTER</a></td>
    		</tr>
    	</table>

    </center>
  </body>
</html>
