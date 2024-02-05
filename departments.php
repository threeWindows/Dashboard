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
        <h2>Rejestracja Oddziału Firmy</h2>
        <form action="add_department.php" method="post">
            <fieldset>
                <label for="nazwaOddzialu">Nazwa Oddziału</label>
                <input type="text" id="nazwaOddzialu" name="nazwaOddzialu" required>
                <label for="ulica">Ulica</label>
                <input type="text" id="ulica" name="ulica" required>
                <label for="numerDomu">Numer Domu</label>
                <input type="text" id="numerDomu" name="numerDomu" required>
                <label for="numerLokalu">Numer Lokalu</label>
                <input type="text" id="numerLokalu" name="numerLokalu">
            </fieldset>
            <fieldset>
                <label for="kod">Kod Pocztowy</label>
                <input type="text" id="kod" name="kod" required>
                <label for="miejscowosc">Miejscowość</label>
                <input type="text" id="miejscowosc" name="miejscowosc" required>
                <label for="telefon">Telefon</label>
                <input type="tel" id="telefon" name="telefon" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </fieldset>
        <input type="submit" value='Zarejestruj Oddział'>
    </form>
  </div>
  <div class="dept-data">
    <table>
    <tr>  
      <th>Nazwa Oddziału</th><th>Ulica</th><th>Nr domu</th><th>Nr Lokalu</th>
      <th>Kod</th><th>Miejscowość</th><th>Telefon</th><th>Email</th>
    </tr>  
            <?php
                define('host', 'localhost');
                define('user', 'root');
                define('pass', '');
                $conn=mysqli_connect(host, user, pass);
                $baza=mysqli_select_db($conn, 'serwis3ct');
                $kwerenda=mysqli_prepare($conn, "SELECT * FROM oddzialy");
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $id, $no, $uo, $nd, $nl, $ko, $mo, $to, $eo);
                while(mysqli_stmt_fetch($kwerenda)){
                    echo "<tr>";
                      echo "<td>".$no."</td><td>".$uo."</td><td>".$nd."</td><td>".$nl."</td><td>".$ko."</td><td>".$mo."</td><td>".$to."</td><td>".$eo."</td>"; 
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