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
        <form action="findByDevice.php" method="post" class="searchContainer">
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

            function allDevice($kw) {
                $conn = mysqli_connect(host,user,pass);
                $baza = mysqli_select_db($conn, 'serwis3ct');

                $kwerenda = mysqli_prepare($conn, $kw);
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $devId, $devSerialNumber, $devProducent, $devModel, $devCategory);

                echo "<tr><th>Numer Seryjny</th><th>Producent</th><th>Model</th><th>Kategoria</th></tr>";
                while(mysqli_stmt_fetch($kwerenda)) {
                    echo"
                <tr class='element' index='$devId'>
                    <td>$devSerialNumber</td>
                    <td>$devProducent</td>
                    <td>$devModel</td>
                    <td>$devCategory</td>
                    <td style='width: 100px;'>
                        <form action='findByDeviceWindow.php' method='post'>
                          <input type='text' value='$devId' name='index' style='display:none;'>
                          <input type='submit' value='Podgląd' style='width: 100px;'>
                        </form>
                    </td>
                </tr>
                ";
                }
            }

            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                if($search == "") {
                    allDevice("SELECT id_sprzetu, nr_seryjny, producent, model, kategoria FROM sprzet");    
                } else {
                    allDevice("SELECT id_sprzetu, nr_seryjny, producent, model, kategoria FROM sprzet WHERE nr_seryjny LIKE '%$search%' OR producent LIKE '%$search%' OR model LIKE '%$search%' OR kategoria LIKE '%$search%'");
                }
            } else {
                allDevice("SELECT id_sprzetu, nr_seryjny, producent, model, kategoria FROM sprzet");
            }
        ?>
    </table>
</div>