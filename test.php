<?php

define('host', 'localhost');
define('user', 'root');
define('pass', '');

$conn=mysqli_connect(host, user, pass);
$baza=mysqli_select_db($conn, 'serwis3ct');

$selectMaxId = mysqli_prepare($conn, "SELECT id_sprzetu FROM sprzet ORDER BY id_sprzetu DESC LIMIT 1");
mysqli_stmt_execute($selectMaxId);
mysqli_stmt_bind_result($selectMaxId, $maxId);

$i = 0;

while(mysqli_stmt_fetch($selectMaxId)) {
    $i = $maxId-1;
}

echo 'asd'. $i;


?>