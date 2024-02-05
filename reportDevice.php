<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reportDevice.css">
    <title>Document</title>
</head>
<body>
    <?php
        include_once('../P/leftPanel.php');

        define('host', 'localhost');
        define('user', 'root');
        define('pass', '');

        $conn=mysqli_connect(host, user, pass);
        $baza=mysqli_select_db($conn, 'serwis3ct');
    ?>
    <form action="addReportDevice.php" method="post" class="reportDeviceCon">
        <fieldset>
            <div class="leftPanel">
                <div>Opis zgłoszenia:</div>
                <textarea rows="25" cols="50" required name="report"></textarea>
            </div>
            <div class="rightPanel">
                <div>
                    <label>Data zgłoszenia:</label>
                    <input type="date" required name="reportDate">
                </div>
                <div>
                    <label>Data odbioru:</label>
                    <input type="date" name="receiveDate">
                </div>
                <div>
                    <label>Klient:</label>
                    <select name="customer" id="" required>
                        <?php

                            $kwerenda = mysqli_prepare($conn, 'SELECT id_klienta, concat(imie_k, " ", nazwisko_k) FROM klient;');
                            mysqli_stmt_execute($kwerenda);
                            mysqli_stmt_bind_result($kwerenda, $idK, $name);

                            while(mysqli_stmt_fetch($kwerenda)) {
                                echo "<option required name='customer' min='1' max='16'>$idK <span>$name</span></option>";
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Pracownik:</label>
                    <select name="employee" id="" required>
                        <?php

                            $kwerenda = mysqli_prepare($conn, 'SELECT id_pracownika, id_oddzialu, concat(imie_p, " ", nazwisko_p, " ", id_oddzialu) FROM pracownik;');
                            mysqli_stmt_execute($kwerenda);
                            mysqli_stmt_bind_result($kwerenda, $idP, $idO, $name);

                            while(mysqli_stmt_fetch($kwerenda)) {
                                echo "<option required name='employee' min='1' max='4'>$idP <span>$name</span></option>";
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Sprzęt:</label>
                    <select name="device" id="" required>
                        <?php

                            $kwerenda = mysqli_prepare($conn, 'SELECT id_sprzetu, concat(nr_seryjny, " ", producent, " ", model) FROM sprzet;');
                            mysqli_stmt_execute($kwerenda);
                            mysqli_stmt_bind_result($kwerenda, $idS, $device);

                            while(mysqli_stmt_fetch($kwerenda)) {
                                echo "<option required name='device' min='1' max='25'>$idS<span>$device</span></option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="submitContainer">
                    <input type="submit" value="Zgłoś urządzenie">
                </div>
            </div>
        </fieldset>
    </form>
</body>
</html>