<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <title>Jackowski</title>
  <script type="text/javascript">
    function ontop(id)
    {
      document.getElementById('layer1').style.zIndex = 0;
      document.getElementById('layer2').style.zIndex = 0;
      document.getElementById('layer3').style.zIndex = 0;
      document.getElementById('layer4').style.zIndex = 0;
      document.getElementById('layer5').style.zIndex = 0;
      document.getElementById(id).style.zIndex = 1;
    }
    </script>
</head>

<body>

    <?php
        $dbhost="mysql01.marianowas11.beep.pl"; $dbuser="odczyt"; $dbpassword="qwerty"; $dbname="baza_do_zadan";
        $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        if (!$polaczenie) {
            echo "Błąd połączenia z MySQL." . PHP_EOL;
            echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $liczba=0;
        $smt[5];
        $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny") or die ("Błąd zapytania do bazy: $dbname");
        while ($wiersz = mysqli_fetch_array ($rezultat)) {
            $nazwa = $wiersz[1];
            $smt[$liczba]=$nazwa;
            $liczba=$liczba+1;
        }
        mysqli_close($polaczenie);
    ?>

    <div id="layer1" style="position:absolute;width:150px;height:150px;
	background-color:yellow;left:100px;top:60px;visibility:visible;">
	<?php 
        echo $smt[0]; 
    ?>
    </div>

    <div id="layer2" style="position:absolute;width:100px;height:100px;
	background-color:orange;left:70px;top:90px;visibility:visible;">
	<?php 
        echo $smt[1]; 
    ?>
    </div>

    <div id="layer3" style="position:absolute;width:100px;height:100px;
	background-color:red;left:130px;top:120px;visibility:visible;">
	<?php 
        echo $smt[2]; 
    ?>
    </div>

    <div id="layer4" style="position:absolute;width:100px;height:100px;
	background-color:blue;left:160px;top:50px;visibility:visible;">
	<?php 
        echo $smt[3]; 
    ?>
    </div>

    <div id="layer5" style="position:absolute;width:100px;height:100px;
	background-color:green;left:145px;top:95px;visibility:visible;">
	<?php 
        echo $smt[4]; 
    ?>
    </div>

    <div>
	<input type="radio" name="rd1" onclick="ontop('layer1');">Yellow
	<input type="radio" name="rd1" onclick="ontop('layer2');">Orange
	<input type="radio" name="rd1" onclick="ontop('layer3');">Red
	<input type="radio" name="rd1" onclick="ontop('layer4');">Blue
    <input type="radio" name="rd1" onclick="ontop('layer5');" checked>Green
    </div>

</body>
</html>
