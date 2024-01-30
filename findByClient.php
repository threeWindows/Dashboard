<link rel="stylesheet" href="css/findBy.css">

<?php
  include_once('../P/leftPanel.php');
?>  

  <div class="mainContainer">
    <div class="main-panel">
      <ul class="panelForm">
        <li><a href="findByClient.php">Klient</a></li>
        <li><a href="findByDepartment.php">Oddział</a></li>
        <li><a href="">Pracownik</a></li>
        <li><a href="">Sprzęt</a></li>
        <form action="findByClient.php" method="post" class="searchContainer">
          <input type="text" name="search" id="search">
          <input type="submit" value="Wyszukaj">
        </form>
      </ul>
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
      
          if(isset($_POST['search'])) {
            $search = $_POST['search'];
            if($search == "") {
              AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu GROUP BY telefon_k ORDER BY nazwisko_k ASC");
            } else {
              AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu WHERE klient.imie_k LIKE '%$search%' OR klient.nazwisko_k LIKE '%$search%' GROUP BY telefon_k ORDER BY nazwisko_k ASC;");
            } 
          } else {
            AllClients("SELECT klient.id_klienta, klient.imie_k, klient.nazwisko_k, klient.telefon_k, klient.email_k, klient.firma_k, klient.ulica_k, klient.numerDomu_k, klient.numerLokalu_k, klient.kodPocztowy_k, klient.miejscowosc_k, sprzet.id_sprzetu, sprzet.nr_seryjny, sprzet.producent, sprzet.model, sprzet.kategoria, zgloszenia.id_klienta, zgloszenia.id_sprzetu FROM klient INNER JOIN zgloszenia ON klient.id_klienta = zgloszenia.id_klienta INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu GROUP BY telefon_k ORDER BY nazwisko_k ASC");
          }
      ?>
      </table>
    </div>

    <div id="windowWithDatas">
      <div id="container">
        <div id="datas">
          <div class="panel">
            <div style="text-align: center;">
              <h2 id="nameAndLastName"></h2>
            </div>
            <ul>
              <li>Numer telefonu: +48 <input type="text"><span id="phoneNumber"></span></li>
              <li>Adres email: <input type="text"><span id="emailAdress"></span></li>
              <li>Pracuje w: <input type="text"><span id="businnesName"></span></li>
              <li>Miejsce zamieszkania: <input type="text"><span id="dwellingPlace"></span></li>
              <li>Kod pocztowy <input type="text"><span id="clientZipCode"></span></li>
              <li>Miejscowość: <input type="text"><span id="clientCity"></span></li>
            </ul>
          </div>
          <div class="panel" id="rightPanel">
            <div style="text-align: center;">
              <h2>Zgłoszone urządzenie</h2>
            </div>
            <ul>
              <li>Numer seryjny: <input type="text"><span id="notSerialNumber"></span></li>
              <li>Producent: <input type="text"><span id="notProducent"></span></li>
              <li>Model: <input type="text"><span id="notModel"></span></li>
              <li>Kategoria: <input type="text"><span id="notCategory"></span></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="btnContainer">
        <form action="findByClient.php" method="post">
          <input type="button" value="Aktualizuj dane" name="updateData" id="changeData">
          <input type="submit" value="Zatwierdź" name="changeUpdatedData" id="changeUpdatedData" style="display: none;">
          <input type="button" value="Wyjdź" id="leave">
          <input type='submit' value='Usuń użytkownika' name='delateUser' id='delateUser'>
        </form>
      </div>
    </div>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['delateUser'])) {

      $indexValue = $_POST["delateUser"];
  
      $clientIndexDelate = $indexValue; //index klienta
      $clientIndexDelate = intval($clientIndexDelate);

      }

      if(isset($_POST['changeUpdatedData'])) {
        $changeIndexValue = $_POST["changeUpdatedData"];
  
        $changeClientData = $changeIndexValue; //index klienta
        $changeClientData = intval($changeClientData);

        echo $changeClientData;
      }
    }
    ?>


    <script src="js/findByClient.js"></script>
