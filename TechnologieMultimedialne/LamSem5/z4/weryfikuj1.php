<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
$user=$_POST['user']; // login z formularza
$pass=$_POST['pass']; // hasło z formularza
$dbhost="mysql01.marianowas11.beep.pl"; $dbuser="odczyt"; $dbpassword="qwerty"; $dbname="baza_do_zadan";
$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if(!$link) { echo"Error: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$result = mysqli_query($link, "SELECT * FROM users WHERE (username='$user') and (password='$pass')"); // TU JEST PIES POGRZEBANY
$rekord = mysqli_fetch_array($result); // pobieranie wiersza z BD, struktura zmiennej jak w BD
if(!$rekord) //Jeśli brak, to nie ma użytkownika o podanym loginie
{
mysqli_close($link); // zamknięcie połączenia z BD
echo "Blad nazwy użytkownika lub hasla";
}
else
{
echo "Logowanie Ok. User: {$rekord['username']}. Hasło: {$rekord['password']}"; // Jeśli $rekord istnieje
}
?>
</BODY>
</HTML>