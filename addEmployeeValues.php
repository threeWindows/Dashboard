<?php
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');

    $conn = mysqli_connect(host,user,pass);
    $baza = mysqli_select_db($conn, 'serwis3ct');

    $employeeName = $_POST['employeeName'];
    $employeeLastName = $_POST['employeeLastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $idO = $_POST['idO'];

    $kwerenda = mysqli_prepare($conn, "INSERT INTO pracownik VALUES(null,?,?,?,?,?)");
    mysqli_stmt_bind_param($kwerenda, 'sssss', $employeeName, $employeeLastName, $phoneNumber, $email, $idO);
    mysqli_stmt_execute($kwerenda);

    if(mysqli_stmt_affected_rows($kwerenda)==1){
        header("Location: ../Projekt/addEmplyee.php");
    }else{
        echo "Blad rejestracji danych w bazie";
    }
?>