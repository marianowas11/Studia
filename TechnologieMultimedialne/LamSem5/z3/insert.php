<!DOCTYPE html>
<html>
  
<head>
    <title>Insert</title>
</head>
  
<body>
<?php
    $dbhost="mysql01.marianowas11.beep.pl"; $dbuser="zapis"; $dbpassword="qwerty"; $dbname="baza_do_zadan";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

    if($polaczenie === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }
            $idADD= $_REQUEST['id'];
            $x0ADD= $_REQUEST['x0'];
            $y0ADD= $_REQUEST['y0'];
            $x_deltaADD= $_REQUEST['x_delta'];
            $y_deltaADD= $_REQUEST['y_delta'];
            $beginADD= $_REQUEST['begin'];
            $diameterADD= $_REQUEST['diameter'];
            $timeADD= $_REQUEST['time'];
            $colorADD= $_REQUEST['color'];
            $osADD= $_REQUEST['os'];

            $sql= "INSERT INTO `animacje` (`id`, `x0`, `y0`, `x_delta`, `y_delta`, `begin`, `diameter`, `time`, `color`, `os`) VALUES ('$idADD', '$x0ADD', '$y0ADD', '$x_deltaADD', '$y_deltaADD', '$beginADD', '$diameterADD', '$timeADD', '$colorADD', '$osADD');";
            
            if(mysqli_query($polaczenie, $sql)){
                echo "<h3>dodano</h3>";
                echo "<script>location.replace(\"https://marianowas11.beep.pl/z3/index5.php\");</script>";
            } else{
                echo "ERROR: Hush! blad dodawania rekordu $sql. " 
                    . mysqli_error($polaczenie);
            }

            mysqli_close($polaczenie);
            ?>
            <h1><a href="index5.php">Cofnij</a></h1>
</body>
  
</html>