<?php
define('host', 'localhost');
define('user', 'root');
define('pass', '');

$conn = mysqli_connect(host,user,pass);
$baza = mysqli_select_db($conn, 'serwis3ct');


if(isset($_POST['confirmClient'])) {
    $constIndexClient = $_POST['constIndexClient'];
    $changeName = $_POST['changeName'];
    $changeLastName = $_POST['changeLastName'];
    $changeTelephone = $_POST['changeTelephone'];
    $changeEmail = $_POST['changeEmail'];
    $changeBusinnes = $_POST['changeBusinnes'];
    $changeStreet = $_POST['changeStreet'];
    $changeHouse = $_POST['changeHouse'];
    $changeLocal = $_POST['changeLocal'];
    $changeZipCode = $_POST['changeZipCode'];
    $changeTown = $_POST['changeTown'];

    $updateClient = mysqli_prepare($conn, "UPDATE klient SET imie_k = '$changeName', nazwisko_k = '$changeLastName', telefon_k = '$changeTelephone', email_K = '$changeEmail', firma_k = '$changeBusinnes', ulica_k = '$changeStreet', numerDomu_k = '$changeHouse', numerLokalu_k = '$changeLocal', kodPocztowy_k = '$changeZipCode', miejscowosc_k = '$changeTown' WHERE id_klienta = $constIndexClient");
    mysqli_stmt_execute($updateClient);

    header("Location: findByClient.php");
  }

  if(isset($_POST['confirmDevice'])) {

    $constIndexDev = $_POST['constIndexDev'];
    $changeSerialNumber = $_POST['changeSerialNumber'];
    $changeProducent = $_POST['changeProducent'];
    $changeModel = $_POST['changeModel'];
    $changeCategory = $_POST['changeCategory'];


    $updateDevice = mysqli_prepare($conn, "UPDATE sprzet SET nr_seryjny = '$changeSerialNumber', producent = '$changeProducent', model = '$changeModel', kategoria='$changeCategory' WHERE id_sprzetu = $constIndexDev");
    mysqli_stmt_execute($updateDevice);

    header("Location: findByClient.php");
} 

?>