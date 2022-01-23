<!DOCTYPE html>
<html>
  
<head>
    <title>Drop</title>
</head>
  
<body>
<?php
    $dbhost="mysql01.marianowas11.beep.pl"; $dbuser="zapis"; $dbpassword="qwerty"; $dbname="baza_do_zadan";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

    if($polaczenie === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }
            $idDrop= $_REQUEST['idDrop'];

            $sql= "DELETE FROM `animacje` WHERE `animacje`.`id` = ".$idDrop."";
            
            if(mysqli_query($polaczenie, $sql)){
                echo "<h3>Dropped</h3>";
                echo "<script>location.replace(\"https://marianowas11.beep.pl/z3/index5.php\");</script>";
            } else{
                echo "ERROR: Hush! Sorry $sql. " 
                    . mysqli_error($polaczenie);
            }
            mysqli_close($polaczenie);
            ?>

            <h1><a href="index5.php">Cofnij</a></h1>
</body>
</html>