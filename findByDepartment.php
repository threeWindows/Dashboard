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

          <form action="findByDepartment.php" method="post" class="searchContainer">
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
      
          if(isset($_POST['search'])) {
            $search = $_POST['search'];
            if($search == "") {
              allDepartments("SELECT id_oddzialu, nazwa_od, ulica_od, numer_domu_od, numer_lokalu_od, kod_o, miejscowosc_o, telefon_o, email_o FROM oddzialy");
            } else {
              allDepartments("SELECT id_oddzialu, nazwa_od, ulica_od, numer_domu_od, numer_lokalu_od, kod_o, miejscowosc_o, telefon_o, email_o FROM oddzialy WHERE nazwa_od LIKE '%$search' OR email_o LIKE '%$search%'");
            } 
          } else {
            allDepartments("SELECT id_oddzialu, nazwa_od, ulica_od, numer_domu_od, numer_lokalu_od, kod_o, miejscowosc_o, telefon_o, email_o FROM oddzialy");
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
        <input type="button" value="Aktualizuj dane" id="changeData">
        <input type="button" value="Wyjdź" id="leave">
        <input type="button" value="Usuń użytkownika" id="delateUser">
      </div>
    </div>