<?php    
        define('host', 'localhost');
        define('user', 'root');
        define('pass', '');

        $conn = mysqli_connect(host,user,pass);
        $baza = mysqli_select_db($conn, 'serwis3ct');

        $nrSeryjny = $_POST['numerSeryjny'];
        $producent = $_POST['producent'];
        $model = $_POST['model'];
        $kategoria = $_POST['kategoria'];

        $kwerenda = mysqli_prepare($conn, "INSERT INTO sprzet VALUES(null,?,?,?,?)");
        mysqli_stmt_bind_param($kwerenda, 'ssss', $nrSeryjny, $producent, $model, $kategoria);
        mysqli_stmt_execute($kwerenda);

        if(mysqli_stmt_affected_rows($kwerenda)==1){
                header("Location: ../Projekt/rejestracjaSprzetu.php");
            }else{
                echo "Blad rejestracji danych w bazie";
            }

?>