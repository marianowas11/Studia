<?php

declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mariusz Jackowski z6</title>
    </script>
</HEAD>
<BODY>
<?php

    session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
    if (!$_SESSION['loggedin'] == "true") {
        $_SESSION['error'] = "Nie zalogowano";
        header('Location: index.php');
        exit();
    }
    echo "<div style=\"position:absolute;right:10px;top:10px;font-size:18px;font-weight:bold;\"><a href=\"logout.php\">Log out</a></div>";
    echo "<div style=\"position:absolute;left:10px;top:10px;font-size:18px;font-weight:bold;\"><a href=\"index2.php\">Powrót</a></div><br><br>";
    print "Username: " . $_SESSION['username'];
    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <?php echo "<p style=\"color:red;font-size:15px;\">" . $_SESSION['error'] . "</p>";
        $_SESSION['error'] = ""; ?>
        Select file to upload (max 25 MB) and fill out the form<br><input type="file" name="fileToUpload" id="fileToUpload"><br>
        <label for="title">*Tytuł:</label><br>
        <input type="text" name="title" required><br>
        <label for="musician">*Autor:</label><br>
        <input type="text" name="musician" required><br>
        <label for="lyrics">Słowa:</label><br>
        <input type="text" name="lyrics"><br>
        <label for="idmt">Rodzaj muzyki:</label><br>
        <select name="idmt">
            <option value="1">Pop</option>
            <option value="2">Rock</option>
            <option value="3">Hip-Hop</option>
            <option value="4">Electronic dance</option>
            <option value="5">R&B</option>
            <option value="6">Latin</option>
            <option value="7">Country</option>
            <option value="8">metal</option>
            <option value="9">jazz</option>
            <option value="10">classic</option>
            <option value="11" selected>None/Unknown</option>
        </select>

        <input type="submit" value="Upload" name="submit">
    </form>
</BODY>
</HTML>