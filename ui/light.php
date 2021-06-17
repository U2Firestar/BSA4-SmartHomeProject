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

      <p class='ueberschrift1'><img src='sym/toggle-on.svg'> Lichtsteuerung</p>
      <p class='ueberschrift2'>Einzelsteuerung</p>
      <table align='center' border='0' width='80%' class='control'>
    		<tr>
    			<td align='center' border='1' width='5%'><img src='sym/light/lightbulb.svg'></td>
    			<td align='center' border='1' width='25%'>K&uuml;che</td>
          <td align='center' border='1' width='5%'>90%</td>
          <td align='center' border='1' width='5%'><img src='sym/trash.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/dash-lg.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/plus-lg.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/toggle-on.svg'></td>
    		</tr>
        <tr>
    			<td align='center' border='1' width='5%'><img src='sym/light/lightbulb-off.svg'></td>
    			<td align='center' border='1' width=25%'>Wohnzimmer</td>
          <td align='center' border='1' width='5%'>0%</td>
          <td align='center' border='1' width='5%'><img src='sym/trash.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/dash-lg.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/plus-lg.svg'></td>
          <td align='center' border='1' width='5%'><img src='sym/toggle-off.svg'></td>
    		</tr>
        <tr>
          <td align='center' border='1' colspan='7' class='button'>
            Neues Licht anlegen
            <form action="light.php" id="newLight" method='post'>
              <label for="name">Name: </label>
              <input type="text" name="name" id="name" maxlength="30">
              <button type="submit">Anlegen</button>
            </form>
          </td>
        </tr>
    	</table>

      <p class='ueberschrift2'>Mastersteuerung</p>
      <table align='center' border='0'>
    		<tr>
    			<td align='center' border='0' width='35%' class='button'><a href='light.php'><img src='sym/light/lightbulb-fill.svg'><br>Alle EIN</a></td>
          <td align='center' border='0' width='10%'></td>
    			<td align='center' border='0' width='35%' class='button'><a href='shutter.php'><img src='sym/light/lightbulb-off-fill.svg'><br>Alle AUS</a></td>
    		</tr>
    	</table>

      <p class='ueberschrift1'><img src='sym/stars.svg'> Szenen</p>
      <table align='center' border='0'>
        <tr>
          <td align='center' border='0' width='15%' class='button'><a href='light.php'><img src='sym/scenes/book.svg'><br>Lesen</a></td>
          <td align='center' border='0' width='5%'></td>
          <td align='center' border='0' width='15%' class='button'><a href='shutter.php'><img src='sym/scenes/headset.svg'><br>Gaming</a></td>
          <td align='center' border='0' width='5%'></td>
          <td align='center' border='0' width='15%' class='button'><a href='shutter.php'><img src='sym/scenes/heart.svg'><br>Romantik</a></td>
          <td align='center' border='0' width='5%'></td>
          <td align='center' border='0' width='15%' class='button'><a href='shutter.php'><img src='sym/scenes/moon-stars.svg'><br>Nacht</a></td>
        </tr>
      </table>

    </center>
  </body>
</html>
