<!DOCTYPE HTML>
<html>
    <head>
        <title>Jackowski z1</title>
    </head>
    <body>
        <a href="index1.php">1.Przełączenie z-index</a><br/>
        <a href="index2.php">2.Przełączanie widoczności elementów</a><br/>
        <a href="index3.php">3.Przełączanie widoczności elementów SVG w JS</a><br/>
        <a href="index4.php">4.Przełączanie widoczności elementów w Bootstrap</a><br/>
        <br>
    
        <?php
        $dbhost="mysql01.marianowas11.beep.pl"; $dbuser="odczyt"; $dbpassword="qwerty"; $dbname="baza_do_zadan";
        $polaczenie = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        if (!$polaczenie) {
            echo "Błąd połączenia z MySQL." . PHP_EOL;
            echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        $rezultat = mysqli_query($polaczenie, "SELECT * FROM domeny") or die ("Błąd zapytania do bazy: $dbname");
        print "<TABLE CELLPADDING=5 BORDER=1>";
        print "<TR><TD>idt</TD><TD>Nazwa</TD></TR>\n";
        while ($wiersz = mysqli_fetch_array ($rezultat)) {
            $idt = $wiersz[0];
            $nazwa = $wiersz[1];
            print "<TR><TD>$idt</TD><TD>$nazwa</TD></TR>\n";
        }
        print "</TABLE>";
        mysqli_close($polaczenie);
        ?>
    </body>
</html>