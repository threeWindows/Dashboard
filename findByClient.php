<link rel="stylesheet" href="css/findBy.css">

<?php
  include_once('../P/leftPanel.php');
?>  

  <div class="mainContainer">
    <div class="main-panel">
      <ul class="panelForm">
        <li><a href="findByClient.php">Klient</a></li>
        <li><a href="findByDepartment.php">Oddział</a></li>
        <li><a href="findByEmployee.php">Serwisant</a></li>
        <li><a href="findByDevice.php">Sprzęt</a></li>
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
          mysqli_stmt_bind_result($kwerenda, $idK, $nameK, $lastNameK, $phoneK, $emailK, $businnesK, $streetK, $houseNumbK, $localNumbK, $zipCodeK, $townK);

          echo "<tr><th>Imię</th><th>Nazwisko</th><th>Numer telefonu</th><th>Email</th><th>Podgląd</th></tr>";

          while(mysqli_stmt_fetch($kwerenda)) {
            echo"
              <tr class='element' index='$idK'>
                <td>$nameK</td>
                <td>$lastNameK</td>
                <td>$phoneK</td>
                <td>$emailK</td>
                <td style='display:none;'>$businnesK</td>
                <td style='width:100px;'>
                  <form action='findByClientWindow.php' method='post'>
                    <input type='text' value='$idK' name='index' style='display:none;'>
                    <input type='submit' value='Podgląd' style='width:100px;'>
                  </form>
                </td>
              </tr>
            ";
          }
        };
      
          if(isset($_POST['search'])) {
            $search = $_POST['search'];
            if($search == "") {
              AllClients("SELECT id_klienta, imie_k, nazwisko_k, telefon_k, email_k, firma_k, ulica_k, numerDomu_k, numerLokalu_k, kodPocztowy_k, miejscowosc_k FROM klient;");
            } else {
              AllClients("SELECT id_klienta, imie_k, nazwisko_k, telefon_k, email_k, firma_k, ulica_k, numerDomu_k, numerLokalu_k, kodPocztowy_k, miejscowosc_k FROM klient WHERE klient.imie_k LIKE '%$search%' OR klient.nazwisko_k LIKE '%$search%'");
            } 
          } else {
            AllClients("SELECT id_klienta, imie_k, nazwisko_k, telefon_k, email_k, firma_k, ulica_k, numerDomu_k, numerLokalu_k, kodPocztowy_k, miejscowosc_k FROM klient;");
          }
      ?>
      </table>
    </div>
    


    <!-- <script src="js/findByClient.js"></script> -->
