<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    #mainContainer {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        background-color: rgb(252, 252, 252);
    }
    #secondContainer {
        margin-top: 3vw;
        width: 90vw;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .dataContainer{
        width: 80vw;
        height: auto;
        background-color: white;
        box-shadow: 6px 6px 10px grey;
        border-radius: 15px;
        margin-top: 25px;
        padding: 0px 15px;
    }
    .dataContainer h2 {
        color: rgb(72, 72, 72);
        font-size: 20px;
    }
    .dataContainer form ul li {
        list-style: none;
    }
    .dataContainer .inp {
        display: none;
        border: none;
        border-bottom: 1px solid black;
        outline: none;
        background-color: white;
    }
    .inp2 {
        background-color: rgb(230,230,230);
    }
    #updateData, input[type='submit'], #updateDepData, .updateDevData, .confirmDevice {
        background-color: rgb(55, 55, 55);
        color: white;
        padding: 11px 25px;
        border-radius: 10px;
        border: none;
    }
    #confirm, #confirmDepartment, .confirmDevice{
        display: none;
    }

    #devicesContainer{
        padding-top: 15px;
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
    }
    .deviceElement{
        width: 24vw;
        height: auto;
        background-color: rgb(238, 238, 238);
        padding: 10px 20px;
        border-radius: 15px;
        margin-left: 10px;
    }
</style>
<?php

    $index = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST["index"];
    }

    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');
    
    $conn = mysqli_connect(host,user,pass);
    $baza = mysqli_select_db($conn, 'serwis3ct');

  $selectClientData = mysqli_prepare($conn, "SELECT id_klienta, imie_k, nazwisko_k, telefon_k, email_k, firma_k, ulica_k, numerDomu_k, numerLokalu_k, kodPocztowy_k, miejscowosc_k FROM klient WHERE id_klienta = $index;");
  mysqli_stmt_execute($selectClientData);
  mysqli_stmt_bind_result($selectClientData, $idK, $nameK, $lastNameK, $telephoneK, $emailK, $businnesK, $streetK, $houseK, $localK, $zipCodeK, $townK);

  echo "
  <div id='mainContainer'>
      <div id='secondContainer'>";
    while(mysqli_stmt_fetch($selectClientData)) {
        echo"
            <div class='dataContainer' i='idK'>
                <h2>Dane Klienta</h2>
                <form action='test.php' method='post'>
                    <ul>
                        <div style='display: none;'>
                            <input type='text' name='constIndexClient' value='$idK'>
                        </div>
                        <li>Imię: <span i='idK'>$nameK</span><input type='text' name='changeName' class='inp' i='idK'></li>
                        <li>Nazwisko: <span i='idK'>$lastNameK</span><input type='text' name='changeLastName' class='inp' i='idK'></li>
                        <li>Numer Telefonu: +48 <span i='idK'>$telephoneK</span><input type='text' name='changeTelephone' class='inp' i='idK'></li>
                        <li>Adres Email: <span i='idK'>$emailK</span><input type='text' name='changeEmail' class='inp inp2' i='idK'></li>
                        <li>Firma: <span i='idK'>$businnesK</span><input type='text' name='changeBusinnes' class='inp' i='idK'></li>
                        <li>Ulica: <span i='idK'>$streetK</span><input type='text' name='changeStreet' class='inp' i='idK'></li>
                        <li>Numer Domu: <span i='idK'>$houseK</span><input type='text' name='changeHouse' class='inp' i='idK'></li>
                        <li>Numer Lokalu: <span i='idK'>$localK</span><input type='text' name='changeLocal' class='inp' i='idK'></li>
                        <li>Kod Pocztowy: <span i='idK'>$zipCodeK</span><input type='text' name='changeZipCode' class='inp' i='idK'></li>
                        <li>Miejscowość: <span i='idK'>$townK</span><input type='text' name='changeTown' class='inp' i='idK'></li>    
                    </ul>
                    <input type='button' value='Aktualizuj Dane' id='updateData' i='idK'>
                    <input type='submit' value='Zatwierdź' id='confirm' name='confirmClient'>
                </form>
            </div>";
    }

    $selectDeviceData = mysqli_prepare($conn, "SELECT sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_sprzetu, zgloszenia.id_klienta FROM sprzet INNER JOIN zgloszenia ON sprzet.id_sprzetu = zgloszenia.id_sprzetu WHERE zgloszenia.id_klienta = $index;");
    mysqli_stmt_execute($selectDeviceData);
    mysqli_stmt_bind_result($selectDeviceData, $devId, $devSerialNumber, $devProducent, $devModel, $devCategory, $notIdS, $notIdK);

    echo "<div class='dataContainer' id='devicesContainer'>";
        while(mysqli_stmt_fetch($selectDeviceData)) {
            echo"
                <form action='test.php' method='post' class='deviceElement'>
                <h2>Dane Urządzenia</h2>
                    <ul>
                        <div style='display: none;'>
                            <input type='text' name='constIndexDev' value='$devId'>
                        </div>
                        <li>Numer Seryjny: <span i='$devSerialNumber' class='serialNumber'>$devSerialNumber</span><input type='text' name='changeSerialNumber' class='inp' style='background-color: rgb(230,230,230);' i='$devSerialNumber'></li>
                        <li>Producent: <span i='$devSerialNumber'>$devProducent</span><input type='text' name='changeProducent' class='inp' i='$devSerialNumber' style='background-color: rgb(230,230,230);'></li>
                        <li>Model: <span i='$devSerialNumber'>$devModel</span><input type='text' name='changeModel' class='inp' i='$devSerialNumber' style='background-color: rgb(230,230,230);'></li>
                        <li>Kategoria: <span i='$devSerialNumber'>$devCategory</span><input type='text' name='changeCategory' class='inp' i='$devSerialNumber' style='background-color: rgb(230,230,230);'></li>
                    </ul>
                    <input type='button' value='Aktualizuj Dane' class='updateDevData' i='$devSerialNumber' devId='$devId'>
                    <input type='submit' value='Zatwierdź' class='confirmDevice' name='confirmDevice' i='$devSerialNumber'>
                </form>";
        }
        echo "</div>";

    echo "
    </div>
  </div>"; 

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

    $updateClient = mysqli_prepare($conn, "UPDATE klient SET imie_k = '$changeName', nazwisko_k = '$changeLastName', telefon_k = '$changeTelephone', email_K = '$changeEmail', firma_k = '$changeBusinnes', ulica_k = '$changeStreet', numerDomu_k = '$changeHouse', numerLokalu_k = '$changeLocal', kodPocztowy_k = '$changeZipCode', miejscowosc_k = '$changeTown' WHERE id_klienta = $index");
    mysqli_stmt_execute($updateClient);

    header("Location: findByDepartment.php");
  }
  

?>


<script src='js/findByClient.js'></script>