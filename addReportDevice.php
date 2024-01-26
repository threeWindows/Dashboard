<?php
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');

    $conn=mysqli_connect(host, user, pass);
    $baza=mysqli_select_db($conn, 'serwis3ct');

    $report = $_POST['report'];
    $reportDate = $_POST['reportDate'];
    $receiveDate = $_POST['receiveDate'];
    $customer = $_POST['customer'];
    $employee = $_POST['employee'];
    $device = $_POST['device'];

    $kwerenda = mysqli_prepare($conn, "INSERT INTO zgloszenia VALUES(null,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($kwerenda, 'sssiii',$report,$reportDate,$receiveDate,$customer,$employee,$device);
    mysqli_stmt_execute($kwerenda);
    if(mysqli_stmt_affected_rows($kwerenda)==1){
        header("Location: ../P/reportDevice.php");
    }else{
        echo "Blad rejestracji danych w bazie";
    }
?>