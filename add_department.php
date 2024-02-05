<?php
    session_start();
    if((isset($_SESSION['usID']))&&($_SERVER['REQUEST_METHOD']==='POST')){
        //polaczenie 
        define('host','localhost');
        define('user','root');
        define('pass','');
        $conn = mysqli_connect(host,user,pass);
        $baza = mysqli_select_db($conn, 'serwis3ct');

        //czyszczenie danych
        $no=$_POST['nazwaOddzialu'];
        $uo=$_POST['ulica'];
        $nd=$_POST['numerDomu'];
        $nl=$_POST['numerLokalu'];
        $ko=$_POST['kod'];
        $mo=$_POST['miejscowosc'];
        $to=$_POST['telefon'];
        $eo=$_POST['email'];

        $kwerenda = mysqli_prepare($conn, "INSERT INTO oddzialy VALUES(null,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($kwerenda, 'sssissss',$no,$uo,$nd,$nl,$ko,$mo,$to,$eo);
        mysqli_stmt_execute($kwerenda);
        if(mysqli_stmt_affected_rows($kwerenda)==1){
            header("Location: ../P/departments.php");
        }else{
            echo "Blad rejestracji danych w bazie";
        }
    }
?>
