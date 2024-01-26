<?php

define('host', 'localhost');
define('user', 'root');
define('pass', '');

$conn = mysqli_connect(host, user, pass);
$baza = mysqli_select_db($conn, 'accounts');

//wstępne czyszczenie danych wejściowych, ucina spacje na początku i na końcu tekstu (jeżeli jest)
$userLogin = mysqli_real_escape_string($conn, trim($_POST['inp1']));
$userPass = mysqli_real_escape_string($conn, trim($_POST['inp2']));

//generowanie bezpiecznego hasła
$userPass = password_hash($userPass, PASSWORD_DEFAULT); //szyfruje hasło, żeby mogło być bezpiecznie przechowywane w bazie

//rejestracja w bazie
$kwerenda = mysqli_prepare($conn, "INSERT INTO users VALUES(null, ?,?)");
mysqli_stmt_bind_param($kwerenda, 'ss', $userLogin, $userPass); //definiuje powyższe pytajniki
mysqli_stmt_execute($kwerenda);

//sprawdzenie
if(mysqli_stmt_affected_rows($kwerenda) == 1) //insert, update, delete (NIE select) -> zwraca liczbe wierszy objetych ostatnim zapytaniem
{
    header("Location: http://localhost/P/main.php");
}
else{
    //echo "Użytkowanik to Bielec";
}
mysqli_close($conn);

?>