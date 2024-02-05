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
        <h2>Rejestracja Pracownika</h2>
        <form action="addEmployeeValues.php" method="post">
            <fieldset style='width:100%;'>
                <label for="employeeName">Imię pracownika:</label>
                <input type="text" id="employeeName" name="employeeName" required>
                <label for="employeeLastName">Nazwisko pracownika:</label>
                <input type="text" id="employeeLastName" name="employeeLastName" required>
                <label for="phoneNumber">Numer telefonu:</label>
                <input type="text" id="phoneNumber" name="phoneNumber" required>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <label for="idO">Id oddziału:</label>
                <input type="text" id="idO" min="1" max="3" name="idO">
            </fieldset>
        <input type="submit" value='Zarejestruj Pracownika'>
    </form>
  </div>
  <div class="dept-data">
    <table>
    <tr>  
    <th>Imię</th><th>Nazwisko</th><th>Telefon</th><th>Email</th><th>Id oddziału</th>

    </tr>  
    <?php
                define('host', 'localhost');
                define('user', 'root');
                define('pass', '');
                $conn=mysqli_connect(host, user, pass);
                $baza=mysqli_select_db($conn, 'serwis3ct');
                $kwerenda=mysqli_prepare($conn, "SELECT * FROM pracownik");
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $id, $name, $lastName, $phoneNumber, $email, $idO);
                while(mysqli_stmt_fetch($kwerenda)){
                    echo "<tr>";
                      echo "<td>".$name."</td><td>".$lastName."</td><td>".$phoneNumber."</td><td>".$email."</td><td>".$idO."</td>"; 
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