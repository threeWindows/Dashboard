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
        $im=$_POST['iKlienta'];
        $na=$_POST['nKlienta'];
        $fi=$_POST['firma'];
        $ul=$_POST['uKlienta'];
        $nd=$_POST['nrDKlienta'];
        $nl=$_POST['nrLKlienta'];
        $ko=$_POST['kod'];
        $mi=$_POST['mKlient'];
        $te=$_POST['telefon'];
        $em=$_POST['email'];





        // $no = $_POST['nazwaOddzialu'];
        // $uo=$_POST['ulica'];
        // $nd=$_POST['numerDomu'];
        // $nl=$_POST['numerLokalu'];

        //rejestracja oddzialu firmy    
        $kwerenda = mysqli_prepare($conn, "INSERT INTO Klient VALUES(null,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($kwerenda, 'sssssssiss',$im,$na,$te,$em,$fi,$ul,$nd,$nl,$ko,$mi);
        mysqli_stmt_execute($kwerenda);
        if(mysqli_stmt_affected_rows($kwerenda)==1){
            header("Location: ../Projekt/klienci.php");
        }else{
            echo "Blad rejestracji danych w bazie";
        }
    }
    //$kwerenda = mysqli_prepare($connection, "SELECT nazwa_od, ulica_od, numer_domu_od, numer_lokalu_od, kod_o, miejscowosc_o,
//telefon_o, email_o FROM Oddzialy WHERE ulica_o=?");
?>
