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
<body>
    <?php
      include_once('../P/leftPanel.php');
    ?>
<div id="a">
<div class='con'>
    <div class="main-panel">
        <div class="form-container">
        <h2>Rejestracja Urządzenia</h2>
        <form action="addDevice.php" method="post">
            <fieldset style='width: 100%;'>
                <label for="numerSeryjny">Numer seryjny:</label>
                <input type="text" id="numerSeryjny" name="numerSeryjny" required>
                <label for="producent">Producent:</label>
                <input type="text" id="producent" name="producent" required>
                <label for="model">model:</label>
                <input type="text" id="model" name="model" required>
                <label for="ketegoria">Kategoria:</label>
                <input type="text" id="kategoria" name="kategoria">
            </fieldset>
        <input type="submit" value='Dodaj Urządzenie'>
    </form>
  </div>
  <div class="dept-data">
    <table>
    <tr>  
      <th>Numer Seryjny</th><th>Producent</th><th>Model</th><th>Kategoria</th>
    </tr>  
            <?php
                define('host', 'localhost');
                define('user', 'root');
                define('pass', '');
                $conn=mysqli_connect(host, user, pass);
                $baza=mysqli_select_db($conn, 'serwis3ct');
                $kwerenda=mysqli_prepare($conn, "SELECT * FROM sprzet");
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $id, $sn, $pr, $mo, $cat,);
                while(mysqli_stmt_fetch($kwerenda)){
                    echo "<tr>";
                      echo "<td>".$sn."</td><td>".$pr."</td><td>".$mo."</td><td>".$cat."</td>"; 
                    echo "</tr>";
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