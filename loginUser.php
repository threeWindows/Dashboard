<?php

define('host', 'localhost');
define('user', 'root');
define('pass', '');

$conn = mysqli_connect(host, user, pass);
$baza = mysqli_select_db($conn, 'accounts');

//================
session_start();
if(($_SERVER['REQUEST_METHOD']==='POST') && hash_equals($_SESSION['log_token'], $_POST['loginToken']))
{



//wstępne czyszczenie danych wejściowych, ucina spacje na początku i na końcu tekstu (jeżeli jest)
$userLogin = mysqli_real_escape_string($conn, trim($_POST['inp1']));
$userPass = mysqli_real_escape_string($conn, trim($_POST['inp2']));

//sprawdzanie danych logowania w bazie
$kwerenda = mysqli_prepare($conn, "SELECT login, password FROM users WHERE login=?");
mysqli_stmt_bind_param($kwerenda, 's', $userLogin);
mysqli_stmt_execute($kwerenda);
mysqli_stmt_bind_result($kwerenda, $vl, $vp);
mysqli_stmt_fetch($kwerenda);

if(password_verify($userPass, $vp))
{
    //uruchamianie sesji uzytkownika
    session_start();
    $_SESSION['usID'] = $vl;
    //usuniecie tokenu logopwania z sesji
    unset($_SESSION['log_token']);
    header('location: dashboard.php');
}
else
{
    echo "Błąd podatności CSRF - błedny token autoryzacji operacji";
}
}
else{
    echo "okook";
}
mysqli_close($conn);

?>