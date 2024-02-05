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
        <form action="findByEmployee.php" method="post" class="searchContainer">
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
            
            function allEmployees($kw) {
                $conn = mysqli_connect(host,user,pass);
                $baza = mysqli_select_db($conn, 'serwis3ct');
      
                $kwerenda = mysqli_prepare($conn, $kw);
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $empId, $empName, $empLastName, $empTelephone, $empEmail, $empDepId);
      
                echo "<tr><th>Imię</th><th>Nazwisko</th><th>Telefon</th><th>Email</th><th>Podgląd</th></tr>";
                while(mysqli_stmt_fetch($kwerenda)) {
                  
                    echo"
                    <tr class='element'>
                      <td>$empName</td>
                      <td>$empLastName</td>
                      <td>$empTelephone</td>
                      <td>$empEmail</td>
                      <td style='width: 100px;'>
                        <form action='findByEmpWindow.php' method='post'>
                          <input type='text' value='$empId' name='index' style='display:none;'>
                          <input type='submit' value='Podgląd' style='width:100px;'>
                        </form>
                      </td>
                    </tr>
                    "; 
                }
            }

            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                if($search == "") {
                  allEmployees("SELECT id_pracownika, imie_p, nazwisko_p, telefon_p, email_p, id_oddzialu FROM pracownik");
                } else {
                    allEmployees("SELECT id_pracownika, imie_p, nazwisko_p, telefon_p, email_p, id_oddzialu FROM pracownik WHERE imie_p LIKE '%$search%' OR nazwisko_p LIKE '%$search%'");
                } 
              } else {
                allEmployees("SELECT id_pracownika, imie_p, nazwisko_p, telefon_p, email_p, id_oddzialu FROM pracownik");
              }
        ?>
    </table>
</div>

<script src="js/findByClient.js"></script>
