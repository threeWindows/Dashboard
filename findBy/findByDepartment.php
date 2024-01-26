<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      define('host', 'localhost');
      define('user', 'root');
      define('pass', '');

      function allDepartments($kw) {
          $conn = mysqli_connect(host,user,pass);
          $baza = mysqli_select_db($conn, 'serwis3ct');

          $kwerenda = mysqli_prepare($conn, $kw);
          mysqli_stmt_execute($kwerenda);
          mysqli_stmt_bind_result($kwerenda, $idO, $depName, $depStreet, $depHome, $depLocal, $depZipCode, $depTown, $depTelephone, $depEmail);
        
          echo "<tr><th>Nazwa oddziału</th><th>Telefon</th><th>Email</th></tr>";
          while(mysqli_stmt_fetch($kwerenda)) {
            echo"
              <tr class='element' index='$idO'>
                <td>$depName</td>
                <td>$depTelephone</td>
                <td>$depEmail</td>
              </tr>
            ";
          }
        };

        allDepartments("SELECT id_oddzialu, nazwa_od, ulica_od, numer_domu_od, numer_lokalu_od, kod_o, miejscowosc_o, telefon_o, email_o FROM oddzialy");
    ?>
</body>
</html>
