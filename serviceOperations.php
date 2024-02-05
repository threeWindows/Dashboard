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
    input, select {
        width: 250px;
        padding: 10px 20px;
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
        <h2>Czynności Serwisowe</h2>
        <form action="serviceOperations.php" method="post">
            <fieldset>
                <label>Opis Czynności</label>
                <textarea name="service" cols="55" rows="15"></textarea>
            </fieldset>
            <fieldset>
                <label>Cena</label>
                <input type="number" name="price" id="">
                <label>Urządzenie</label>
                <select name="device">
                    <?php
                        $selectMaxId = mysqli_prepare($conn, "SELECT id_sprzetu FROM sprzet ORDER BY id_sprzetu DESC LIMIT 1");
                        mysqli_stmt_execute($selectMaxId);
                        mysqli_stmt_bind_result($selectMaxId, $i);

                        $maxId = 0;

                        while(mysqli_stmt_fetch($selectMaxId)) {
                            $maxId = $i;
                        }

                        $selectDevice = mysqli_prepare($conn, "SELECT id_sprzetu, nr_seryjny FROM sprzet");
                        mysqli_stmt_execute($selectDevice);
                        mysqli_stmt_bind_result($selectDevice, $deviceId, $serialNumber);

                        while(mysqli_stmt_fetch($selectDevice)) {
                            echo "<option name='device' value='$deviceId' min='1' max='$maxId'>$serialNumber</option>";
                        }
                    ?>
                </select>
            </fieldset>
        <input type="submit" value='Zarejestruj' name='sub'>
    </form>
  </div>
  <div class="dept-data">
    <?php
    if(isset($_POST['sub'])) {

        $service = $_POST['service'];
        $price = $_POST['price'];
        $device = $_POST['device'];

        $addData = mysqli_prepare($conn, "INSERT INTO czynnosciserwisowe VALUES(null,?,?,?)");
        mysqli_stmt_bind_param($addData, 'sii',$service,$price,$device);
        mysqli_stmt_execute($addData);
    }
    ?>
    <table>
    <tr>  
      <th>Opis Czynności</th><th>Cena</th><th>Urządzenie</th>
    </tr>  
            <?php
                $kwerenda=mysqli_prepare($conn, "SELECT czynnosciserwisowe.id_czynnosci, czynnosciserwisowe.opis_czynnosci, czynnosciserwisowe.cena, czynnosciserwisowe.id_sprzetu, sprzet.id_sprzetu, sprzet.nr_seryjny FROM czynnosciserwisowe INNER JOIN sprzet ON czynnosciserwisowe.id_sprzetu = sprzet.id_sprzetu;");
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $serviceId, $serviceDesc, $servicePrice, $serviceIdS, $devId, $devSerialNumber);
                while(mysqli_stmt_fetch($kwerenda)){
                    echo "
                    <tr>
                        <td>$serviceDesc</td>
                        <td>$servicePrice</td>
                        <td>$devSerialNumber</td>
                    </tr>";
                }
                mysqli_close($conn);
            ?>
        </table>
        </div>
</div>
</div>
</div>
</body>
</html>