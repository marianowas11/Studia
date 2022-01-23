<?php declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mariusz Jackowski z4</title>
</HEAD>
<BODY>
<?php    
    session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
    if (!isset($_SESSION['loggedin']))
    {
        header('Location: index3.php');
        exit();
    }
    echo "Zalogowany";
    echo "<br><br><h3><a href=\"logout.php\">Log out</a></h3>";
?>
</BODY>
</HTML>