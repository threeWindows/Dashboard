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
    <div class="con">
    <div class="main-panel">
        <div class="form-container">
        <h2>Rejestracja Klienta</h2>
        <form action="add_customer.php" method="post">
            <fieldset>
                <label for="nazwaOddzialu">Imię klienta:</label>
                <input type="text" id="iKlienta" name="iKlienta">
                <label for="ulica">Nazwisko klienta:</label>
                <input type="text" id="nKlienta" name="nKlienta">
                <label for="numerDomu">Firma / instytucja:</label>
                <input type="text" id="firma" name="firma">
                <label for="numerLokalu">Ulica:</label>
                <input type="text" id="uKlienta" name="uKlienta"> 
                <label for="kod">Nr domu klienta:</label>
                <input type="text" id="nrDKlienta" name="nrDKlienta">
            </fieldset>
            <fieldset>
                <label for="miejscowosc">Nr lokalu klienta:</label>
                <input type="text" id="nrLKlienta" name="nrLKlienta">
                <label for="telefon">Kod:</label>
                <input type="tel" id="kod" name="kod">
                <label for="telefon">Miejscowość:</label>
                <input type="tel" id="mKlient" name="mKlient">
                <label for="telefon">Telefon:</label>
                <input type="tel" id="telefon" name="telefon">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </fieldset>
                <input type="submit" value='Zarejestruj Klienta'>
        </form>
  </div>
  <div class="dept-data">
    <table>
    <tr>  
      <th>Imię klienta</th><th>Nazwisko klienta</th><th>Nr telefonu</th><th>Email</th>
      <th>firma</th><th>Ulica</th><th>Nr domu</th><th>Nr lokalu</th><th>Kod pocztowy</th><th>Miejscowosc</th>
    </tr>  
            <?php
                define('host', 'localhost');
                define('user', 'root');
                define('pass', '');
                $conn=mysqli_connect("localhost","root","","serwis3ct");
                $kwerenda=mysqli_prepare($conn,"SELECT * FROM Klient");          
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda,$id,$im,$na,$te,$em,$fi,$ul,$nd,$nl,$ko,$mi);
                while(mysqli_stmt_fetch($kwerenda)){
                    echo "<tr>";
                      echo "<td>$im</td><td>$na</td><td>$te</td><td>$em</td><td>$fi</td><td>$ul</td><td>$nd</td><td>$nl</td><td>$ko</td><td>$mi</td>";
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