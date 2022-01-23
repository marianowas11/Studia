<!DOCTYPE html>
<html>
  
<head>
    <title>Reset</title>
</head>
  
<body>
<?php
    $dbhost="mysql01.marianowas11.beep.pl"; $dbuser="zapis"; $dbpassword="qwerty"; $dbname="baza_do_zadan";
    $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    $z=0;
    if($polaczenie === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }

            $sql1= "DROP TABLE `animacje`;";
            
            if(mysqli_query($polaczenie, $sql1)){
                echo "<h3>Usunięto tabele</h3>";
                $z++; 
            } else{
                echo "ERROR: Bląd usuwania tabeli! $sql1. " 
                    . mysqli_error($polaczenie);
            }
            
            $sql2="CREATE TABLE `animacje` (
                `id` int(11) NOT NULL,
                `x0` int(11) NOT NULL,
                `y0` int(11) NOT NULL,
                `x_delta` int(11) NOT NULL,
                `y_delta` int(11) NOT NULL,
                `begin` int(11) NOT NULL,
                `diameter` int(11) NOT NULL,
                `time` int(11) NOT NULL,
                `color` text COLLATE utf8_polish_ci NOT NULL,
                `os` text COLLATE utf8_polish_ci NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;";
            if(mysqli_query($polaczenie, $sql2)){
                echo "<h3>Dodano tabele</h3>";
                $z++;
            } else{
                echo "ERROR: Blad dodawania tabeli! $sql2. " 
                    . mysqli_error($polaczenie);
            }

            $sql3="INSERT INTO `animacje` (`id`, `x0`, `y0`, `x_delta`, `y_delta`, `begin`, `diameter`, `time`, `color`, `os`) VALUES
            (1, 10, 10, 200, 10, 0, 10, 2, 'red', 'x'),
            (2, 200, 10, 200, 200, 0, 10, 2, 'red', 'y'),
            (3, 200, 200, 10, 200, 0, 10, 2, 'red', 'x'),
            (4, 10, 200, 10, 10, 0, 10, 2, 'red', 'y'),
            (5, 30, 30, 170, 30, 0, 10, 2, 'blue', 'x'),
            (6, 170, 30, 170, 170, 0, 10, 2, 'blue', 'y'),
            (7, 170, 170, 30, 170, 0, 10, 2, 'blue', 'x'),
            (8, 30, 170, 30, 30, 0, 10, 2, 'blue', 'y'),
            (9, 50, 50, 150, 50, 0, 10, 2, 'green', 'x'),
            (10, 150, 50, 150, 150, 0, 10, 2, 'green', 'y'),
            (11, 150, 150, 50, 150, 0, 10, 2, 'green', 'x'),
            (12, 50, 150, 50, 50, 0, 10, 2, 'green', 'y'),
            (13, 70, 70, 130, 70, 0, 10, 2, 'orange', 'x'),
            (14, 130, 70, 130, 130, 0, 10, 2, 'orange', 'y'),
            (15, 130, 130, 70, 130, 0, 10, 2, 'orange', 'x'),
            (16, 70, 130, 70, 70, 0, 10, 2, 'orange', 'y');";
            if(mysqli_query($polaczenie, $sql3)){
                echo "<h3>Dodano rekordy</h3>"; 
                $z++;
            } else{
                echo "ERROR: Blad dodawania rekordow! $sql3. " 
                    . mysqli_error($polaczenie);
            }

            $sql4="ALTER TABLE `animacje`
            ADD PRIMARY KEY (`id`);";
            if(mysqli_query($polaczenie, $sql4)){
                echo "<h3>Dodano klucz główny</h3>";
                $z++;
            } else{
                echo "ERROR: Blad dodawania klucza głównego! $sql4. " 
                    . mysqli_error($polaczenie);
            }

            $sql5="COMMIT;";
            if(mysqli_query($polaczenie, $sql5)){
                echo "<h3>Potwierdzono</h3>";
                if($z==4){echo "<script>location.replace(\"https://marianowas11.beep.pl/z3/index5.php\");</script>";}
            } else{
                echo "ERROR: Blad zatwierdzania $sql5. " 
                    . mysqli_error($polaczenie);
            }
            mysqli_close($polaczenie);
            ?>
            <h1><a href="index5.php">Cofnij</a></h1>
</body>
</html>