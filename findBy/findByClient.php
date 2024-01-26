<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="mainContainer">
      <div class="main-panel">
        <form action="findByClient.php" method="post" class="searchContainer">
          <input type="text" name="searcha" id="searcha">
          <input type="submit" value="Wyszukaj">
        </form>
      </div>
    </div>

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

            AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu GROUP BY telefon_k ORDER BY nazwisko_k ASC");

        if(isset($_POST['search'])) {
          $search = $_POST['search'];

          if($search == "") {
            AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu GROUP BY telefon_k ORDER BY nazwisko_k ASC");
          } else {
            AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu WHERE klient.imie_k LIKE '%$search%' OR klient.nazwisko_k LIKE '%$search%' GROUP BY telefon_k ORDER BY nazwisko_k ASC;");
            allDepartments("SELECT id_oddzialu, nazwa_od, ulica_od, numer_domu_od, numer_lokalu_od, kod_o, miejscowosc_o, telefon_o, email_o FROM oddzialy WHERE nazwa_od LIKE '%$search' OR email_o LIKE '%$search%'");
          }
        }

    ?>
</div>
    
</body>
</html>
