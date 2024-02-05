<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&family=Roboto+Condensed:wght@500&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='css/leftPanelLinks.css'>
    <title>Dashboard</title>
</head>
<style>
    select {
        text-align: center;
        width: 300px;
        padding: 10px 35px;
    }
</style>
<body>
    <?php
      include_once('../P/leftPanel.php');

      define('host', 'localhost');
      define('user', 'root');
      define('pass', '');

      $conn=mysqli_connect(host, user, pass);
      $baza=mysqli_select_db($conn, 'serwis3ct');
    ?>
<div id="a">
<div class='con'>
    <div class="main-panel">
        <div class="form-container">
        <h2>Status Naprawy</h2>
        <form action="repairStatus.php" method="post">
            <fieldset style='width: 100%;'>
                <label>Data Zmiany</label>
                <input type="date" name="date" required>
                <label>Status</label>
                <select name="status">
                    <option name="status">Przyjęto w oddziale</option>
                    <option name="status">W trakcie naprawy</option>
                    <option name="status">Gotowy do odbioru</option>
                </select>
                <label for="numerDomu">Id Sprzętu</label>
                <select name="device">
                    <?php
                        $selectDevice = mysqli_prepare($conn, "SELECT id_sprzetu, nr_seryjny FROM sprzet");
                        mysqli_stmt_execute($selectDevice);
                        mysqli_stmt_bind_result($selectDevice, $deviceId, $serialNumber);

                        while(mysqli_stmt_fetch($selectDevice)) {
                            echo "<option name='device' value='$deviceId' min='1' max='25'>$serialNumber</option>";
                        }
                    ?>
                </select>
            </fieldset>
        <input type="submit" value='Zarejestruj Oddział' name='sub'>
    </form>
  </div>
  <div class="dept-data">
    <?php
    if(isset($_POST['sub'])) {

        $date = $_POST['date'];
        $status = $_POST['status'];
        $device = $_POST['device'];

        $addData = mysqli_prepare($conn, "INSERT INTO statusnaprawy VALUES(null,?,?,?)");
        mysqli_stmt_bind_param($addData, 'ssi',$date,$status,$device);
        mysqli_stmt_execute($addData);
    }
    ?>
    <table>
    <tr>  
      <th>Data zmiany</th><th>Status</th><th>Urządzenie</th>
    </tr>  
            <?php
            if(isset($_POST['sub'])) {
                $kwerenda=mysqli_prepare($conn, "SELECT statusnaprawy.id_statusu, statusnaprawy.data_zmiany, statusnaprawy.stat, statusnaprawy.id_sprzetu, sprzet.id_sprzetu, sprzet.nr_seryjny FROM statusnaprawy INNER JOIN sprzet ON statusnaprawy.id_sprzetu = sprzet.id_sprzetu;");
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $statId, $statDate, $statStat, $statIdS, $devId, $devSerialNumber);
                while(mysqli_stmt_fetch($kwerenda)){
                    echo "
                    <tr>
                        <td>$statDate</td>
                        <td>$statStat</td>
                        <td>$devSerialNumber</td>
                    </tr>";
                }
                mysqli_close($conn);
            }
            ?>
        </table>
        </div>
</div>
</div>
</div>
</body>
</html>