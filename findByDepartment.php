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
          mysqli_stmt_bind_result($kwerenda, $depId, $depName, $depStreet, $depHouseNumb, $depLocalNumb, $depZipCode, $depTown, $depTelephone, $depEmail);

          echo "<tr><th>Nazwa oddziału</th><th>Telefon</th><th>Email</th><th>Podgląd</th></tr>";
          while(mysqli_stmt_fetch($kwerenda)) {
            
              echo"
              <tr class='element' 
                depIndex='$depId'
                depName='$depName'
                depStreet='$depStreet'
                depHouseNumb='$depHouseNumb'
                depLocalNumb='$depLocalNumb'
                depZipCode='$depZipCode'
                depTown='$depTown'
                depTelephone='$depTelephone'
                depEmail='$depEmail' 
              >
                <td>$depName</td>
                <td>$depTelephone</td>
                <td>$depEmail</td>
                <td style='width:100px;'>
                  <form action='findByDepartmentWindow.php' method='post'>
                    <input type='text' value='$depId' name='index' style='display:none;'>
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
<script>
</script>