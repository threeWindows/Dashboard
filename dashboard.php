<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&family=Roboto+Condensed:wght@500&family=Roboto+Slab&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
<body>

    <?php

    ?>

    <div class="mainContainer">
        <?php
          include_once('../P/leftPanel.php');
        ?>  
      <div class="main-panel">
        
        <ul class="panelForm">
          <li><a href="findByClient.php">Klient</a></li>
          <li><a href="findByDepartment.php">Oddział</a></li>
          <li><a href="">Pracownik</a></li>
          <li><a href="">Sprzęt</a></li>
        </ul>
          
        <form action="dashboard.php" method="post" class="searchContainer">
          <input type="text" name="search" id="search">
          <input type="submit" value="Wyszukaj">
        </form>
        <button id="btn">Change</button>
        <button id="btn2">Check</button>
      </div>
    </div>

    <div class="con">
      <table>
      <?php
        define('host', 'localhost');
        define('user', 'root');
        define('pass', '');

        function AllClients($kw) {
          $conn = mysqli_connect(host,user,pass);
          $baza = mysqli_select_db($conn, 'serwis3ct');
          
          $kwerenda = mysqli_prepare($conn, $kw);
          mysqli_stmt_execute($kwerenda);
          mysqli_stmt_bind_result($kwerenda, $idK, $nameK, $lastNameK, $phoneK, $emailK, $businnesK, $streetK, $houseNumbK, $localNumbK, $zipCodeK, $townK, $idS, $serialNumbS, $producentS, $modelS, $categoryS, $idZK, $idZS);
        
          echo "<tr><th>Imię</th><th>Nazwisko</th><th>Numer telefonu</th><th>Email</th></tr>";
          while(mysqli_stmt_fetch($kwerenda)) {
            echo"
              <tr class='element' index='$idK' 
                  name='$nameK' 
                  lastName='$lastNameK' 
                  phone='$phoneK' 
                  email='$emailK'
                  businnes='$businnesK'
                  street='$streetK'
                  houseNumbK='$houseNumbK'
                  localNumbK='$localNumbK'
                  zipCodeK='$zipCodeK'
                  townK='$townK'
                  serialNumbS='$serialNumbS'
                  producentS='$producentS'
                  modelS='$modelS'
                  categoryS='$categoryS'>

                <td>$nameK</td>
                <td>$lastNameK</td>
                <td>$phoneK</td>
                <td>$emailK</td>
                <td style='display:none;'>$businnesK</td>
              </tr>
            ";
          }
        };

        function allDepartments($kw) {
          $conn = mysqli_connect(host,user,pass);
          $baza = mysqli_select_db($conn, 'serwis3ct');

          $kwerenda = mysqli_prepare($conn, $kw);
          mysqli_stmt_execute($kwerenda);
          mysqli_stmt_bind_result($kwerenda, $idO, $depName, $depStreet, $depHome, $depLocal, $depZipCode, $depTown, $depTelephone, $depEmail);
        
          echo "<tr><th>Nazwa oddziału</th><th>Telefon</th><th>Email</th></tr>";
          while(mysqli_stmt_fetch($kwerenda)) {
            echo"
              <tr class='element' index='$idO'>
                <td>$depName</td>
                <td>$depTelephone</td>
                <td>$depEmail</td>
              </tr>
            ";
          }
        };

        //WYSZUKIWANIE POPRZEZ KLIENTA 
        if(isset($_POST['findByClient'])) {
          AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu GROUP BY telefon_k ORDER BY nazwisko_k ASC");
        }

                //asdasd

                //WYSZUKIWANIE PO ODDZIALE

                if(isset($_POST['findByDepartment'])) {
                  
                  session_start();
                  $_SESSION['findByDepartmentActive'] = 'findByDepartmentActive';

                  allDepartments("SELECT id_oddzialu, nazwa_od, ulica_od, numer_domu_od, numer_lokalu_od, kod_o, miejscowosc_o, telefon_o, email_o FROM oddzialy");
                }

        // if(isset($_POST['search'])) {
        //   $search = $_POST['search'];

        //   if($search == "") {
        //     AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu GROUP BY telefon_k ORDER BY nazwisko_k ASC");
        //   } 
        //   if($clientName == "findByClientActive"){
        //     AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu WHERE klient.imie_k LIKE '%$search%' OR klient.nazwisko_k LIKE '%$search%' GROUP BY telefon_k ORDER BY nazwisko_k ASC;");
        //   } 
        //   // if($search != "" && $departmentName=="findByDepartmentActive") {
        //   //   allDepartments("SELECT id_oddzialu, nazwa_od, ulica_od, numer_domu_od, numer_lokalu_od, kod_o, miejscowosc_o, telefon_o, email_o FROM oddzialy WHERE nazwa_od LIKE '%$search' OR email_o LIKE '%$search%'");
        //   // }
        // }
      ?>
      </table>
    </div>
</body>
</html>