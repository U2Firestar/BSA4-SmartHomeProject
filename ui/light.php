<!doctype html>

<?php
  $url = 'http://13.53.174.25:5000/resource/lights';

  //Use file_get_contents to GET the URL in question.
  $contents = file_get_contents($url);
  $arr = json_decode($contents, true);
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>SmartHome - Licht</title>
	<?php include 'header.inc.php'; ?>

  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <center>

      <p class='ueberschrift1'><img src='sym/toggle-on.svg'> Lichtsteuerung</p>
      <p class='ueberschrift2'>Einzelsteuerung</p>
      <table align='center' border='0' width='80%' class='control'>

            <?php
            foreach($arr as $key => $val) {
              echo "
              <tr>
          			<td align='center' border='1' width='5%'>
                ";

                if ($val == 0)
                {
                  echo "<img src='sym/light/lightbulb-off.svg'>";
                }
                else
                {
                  echo "<img src='sym/light/lightbulb.svg'>";
                }

                echo "
                </td>
          			<td align='center' border='1' width='25%'>
                ";
                echo $key;
                echo "</td>
                <td align='center' border='1' width='5%'>
                ";
                echo strval($val);
                echo "%";
                echo "</td>
                <td align='center' border='1' width='5%'><img src='sym/trash.svg'
                onClick='sendData2()'></td>
                <td align='center' border='1' width='5%'><img src='sym/dash-lg.svg'></td>
                <td align='center' border='1' width='5%'><img src='sym/plus-lg.svg'></td>
                <td align='center' border='1' width='5%'>
                ";

                if ($val == 0)
                {
                  echo "<img src='sym/toggle-off.svg'>";
                }
                else
                {
                  echo "<img src='sym/toggle-on.svg'>";
                }

                echo "
                </td>
          		</tr>
              ";
            }
            ?>

            <script>
            function deleteData()
            {
              alert("Deleting");
              fetch('http://13.53.174.25:5000/resource/lights/light1', {
                method:'DELETE'
              });
            }



            function sendData()
            {
              alert("Sending DELETE!");
              $.ajax({
                //the url to send the data to
                url: "http://13.53.174.25:5000/resource/lights/light1",
                //type. for eg: GET, POST
                type: "DELETE",
                contentType:'application/json',
                dataType: 'text',
                //on success
                success: function()
                {
                  alert("Successful!");
                },
                //on error
                error: function()
                {
                  alert("Not Successful!");
                }
              });
            }

            function sendData2()
            {
              var url = "http://13.53.174.25:5000/resource/lights/light1";

              var xhr = new XMLHttpRequest();
              xhr.open("DELETE", url, true);

              xhr.onreadystatechange = function () {
                 if (xhr.readyState === 4) {
                    console.log(xhr.status);
                    console.log(xhr.responseText);
                 }};
              alert("Sending");
              xhr.send();
              alert("Sending done");
            }

            // function deleteData(item)
            // {
            //   alert("DELETING");
            //   fetch('http://13.53.174.25:5000/resource/lights/light1' , { //+ item
            //     method: 'DELETE'
            //   });
            // }

//             function sendData3()
//             {
//
//               $.ajax({
//                 url: 'http://localhost:8080/actors/remover',
//                 type: 'DELETE',
//                 data: {movie:movie},
//                 contentType:'application/json',
//                 dataType: 'text',
//                 success: function(result) {...},
//                 error: function(result){...}
// });

        </script>

        <tr>
          <td align='center' border='1' colspan='7' class='button'>
            Neues Licht anlegen
            <form action="http://13.53.174.25:5000/resource/lights/abc" id="newLight" method='post'>
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
