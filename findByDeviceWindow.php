
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    #mainContainer {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        background-color: rgb(252, 252, 252);
    }
    #secondContainer {
        margin-top: 3vw;
        width: 90vw;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .dataContainer{
        width: 80vw;
        height: auto;
        background-color: white;
        box-shadow: 6px 6px 10px grey;
        border-radius: 15px;
        margin-top: 25px;
        padding: 0px 15px;
    }
    .dataContainer h2 {
        color: rgb(72, 72, 72);
        font-size: 20px;
    }
    .dataContainer form ul li {
        list-style: none;
    }
    .dataContainer .inp {
        display: none;
        border: none;
        border-bottom: 1px solid black;
        outline: none;
        background-color: white;
    }
    .inp2 {
        background-color: rgb(230,230,230);
    }
    #updateData, input[type='submit'], #updateDepData, .updateDevData, .confirmDevice {
        background-color: rgb(55, 55, 55);
        color: white;
        padding: 11px 25px;
        border-radius: 10px;
        border: none;
    }
    #confirm, #confirmDepartment, .confirmDevice{
        display: none;
    }

    #devicesContainer{
        padding-top: 15px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .deviceElement{
        width: 24vw;
        height: auto;
        background-color: rgb(238, 238, 238);
        padding: 10px 20px;
        border-radius: 15px;
    }
</style>

<?php
    $index = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['index'])) {
            $index = $_POST["index"];
        }
    }

    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');
    
    $conn = mysqli_connect(host,user,pass);
    $baza = mysqli_select_db($conn, 'serwis3ct');

    $selectDevice = mysqli_prepare($conn, "SELECT id_sprzetu, nr_seryjny, producent, model, kategoria FROM sprzet WHERE id_sprzetu = $index");
    mysqli_stmt_execute($selectDevice);
    mysqli_stmt_bind_result($selectDevice, $devId, $devSerialNumber, $devProducent, $devModel, $devCategory);


    echo "
    <div id='mainContainer'>
        <div id='secondContainer'>";
        while(mysqli_stmt_fetch($selectDevice)) {
            echo"
            <div class='dataContainer' i='$devId'>
                <h2>Dane Urządzenia</h2>
                <form action='findByDeviceWindow.php' method='post'>
                    <ul>
                        <div style='display: none;'>
                            <input type='text' name='constIndexDev' value='$devId'>
                        </div>
                        <li>Numer Seryjny: <span i='devId'>$devSerialNumber</span><input type='text' name='changeSerialNumber' class='inp' i='devId'></li>
                        <li>Producent: <span i='devId'>$devProducent</span><input type='text' name='changeProducent' class='inp' i='devId'></li>
                        <li>Model: <span i='devId'>$devModel</span><input type='text' name='changeModel' class='inp' i='devId'></li>
                        <li>Kategoria: <span i='devId'>$devCategory</span><input type='text' name='changeCategory' class='inp inp2' i='devId'></li>
                    </ul>
                    <input type='button' value='Aktualizuj Dane' class='updateDevData' i='devId'>
                    <input type='submit' value='Zatwierdź' id='confirmDevice' name='confirmDevice'>
                </form>
            </div>";
        }

        $selectDepartmentData = mysqli_prepare($conn, "SELECT oddzialy.id_oddzialu, oddzialy.nazwa_od, oddzialy.ulica_od, oddzialy.numer_domu_od, oddzialy.numer_lokalu_od, oddzialy.kod_o, oddzialy.miejscowosc_o, oddzialy.telefon_o, oddzialy.email_o, pracownik.id_oddzialu, zgloszenia.id_pracownika, zgloszenia.id_sprzetu, sprzet.id_sprzetu FROM oddzialy INNER JOIN pracownik ON oddzialy.id_oddzialu = pracownik.id_oddzialu INNER JOIN zgloszenia ON zgloszenia.id_pracownika = pracownik.id_pracownika INNER JOIN sprzet ON zgloszenia.id_sprzetu = sprzet.id_sprzetu WHERE sprzet.id_sprzetu = $index");
        mysqli_stmt_execute($selectDepartmentData);
        mysqli_stmt_bind_result($selectDepartmentData, $depId, $depName, $depStreet, $depHouse, $depLocal, $depZipCode, $depTown, $depTelephone, $depEmail, $empId, $notIdP, $notIdS, $devId);

        while(mysqli_stmt_fetch($selectDepartmentData)) {
            echo"
            <div class='dataContainer'>
                <h2>Dane Oddzialu</h2>
                <form action='findByDeviceWindow.php' method='post'>
                    <ul>
                        <div style='display: none;'>
                            <input type='text' name='constIndexDep' value='$depId'>
                        </div>
                        <li>Nazwa Oddzialu: <span i='depId' id='depName'>$depName</span><input type='text' name='changeDepName' class='inp' i='depId'></li>
                        <li>Ulica: <span i='depId' id='depStreet'>$depStreet</span><input type='text' name='changeDepStreet' class='inp' i='depId'></li>
                        <li>Numer Domu: <span i='depId' id='depHouse'>$depHouse</span><input type='text' name='changeDepHouse' class='inp' i='depId'></li>
                        <li>Numer Lokalu: <span i='depId' id='depLocal'>$depLocal</span><input type='text' name='changeDepLocal' class='inp' i='depId'></li>
                        <li>Kod Pocztowy: <span i='depId' id='depZipCode'>$depZipCode</span><input type='text' name='changeDepZipCode' class='inp' i='depId'></li>
                        <li>Miejscowość: <span i='depId' id='depTown'>$depTown</span><input type='text' name='changeDepTown' class='inp' i='depId'></li>
                        <li>Numer Telefonu: <span i='depId' id='depTelephone'>$depTelephone</span><input type='text' name='changeDepTelephone' class='inp' i='depId'></li>
                        <li>Adres Email: <span i='depId' id='depEmail'>$depEmail</span><input type='text' name='changeDepEmail' class='inp' i='depId'></li>
                    </ul>
                    <input type='button' value='Aktualizuj Dane' id='updateDepData' i='depId'>
                    <input type='submit' value='Zatwierdź' id='confirmDepartment' name='confirmDepartment'>
                </form>
            </div>";
        }

        $selectEmployeeData = mysqli_prepare($conn, "SELECT pracownik.id_pracownika, pracownik.imie_p, pracownik.nazwisko_p, pracownik.telefon_p, pracownik.email_p, pracownik.id_oddzialu, sprzet.id_sprzetu, zgloszenia.id_pracownika, zgloszenia.id_sprzetu FROM pracownik INNER JOIN zgloszenia ON zgloszenia.id_pracownika = pracownik.id_pracownika INNER JOIN sprzet ON sprzet.id_sprzetu = zgloszenia.id_sprzetu WHERE sprzet.id_sprzetu = $index;");
        mysqli_stmt_execute($selectEmployeeData);
        mysqli_stmt_bind_result($selectEmployeeData, $empId, $empName, $empLastName, $empTelephone, $empEmail, $empDepId, $devIdS, $notIdEmp, $notIdDev);

        while(mysqli_stmt_fetch($selectEmployeeData)) {
            echo"
            <div class='dataContainer' i='$empId'>
                <h2>Dane Pracownika</h2>
                <form action='findByEmpWindow.php' method='post'>
                    <ul>
                        <div style='display: none;'>
                            <input type='text' name='constIndexEmp' value='$empId'>
                        </div>
                        <li>Imię: <span i='empId'>$empName</span><input type='text' name='changeName' class='inp' i='empId'></li>
                        <li>Nazwisko: <span i='empId'>$empLastName</span><input type='text' name='changeLastName' class='inp' i='empId'></li>
                        <li>Numer Telefonu: +48 <span i='empId'>$empTelephone</span><input type='text' name='changeTelephone' class='inp' i='empId'></li>
                        <li>Adres Email: <span i='empId'>$empEmail</span><input type='text' name='changeEmail' class='inp inp2' i='empId'></li>
                    </ul>
                    <input type='button' value='Aktualizuj Dane' id='updateData' i='empId'>
                    <input type='submit' value='Zatwierdź' id='confirm' name='confirmEmployee'>
                </form>
            </div>";
        }

    echo "
        </div>
    </div>";        

    if(isset($_POST['confirmDevice'])) {

        $constIndexDev = $_POST['constIndexDev'];
        $changeSerialNumber = $_POST['changeSerialNumber'];
        $changeProducent = $_POST['changeProducent'];
        $changeModel = $_POST['changeModel'];
        $changeCategory = $_POST['changeCategory'];


        $updateDevice = mysqli_prepare($conn, "UPDATE sprzet SET nr_seryjny = '$changeSerialNumber', producent = '$changeProducent', model = '$changeModel', kategoria='$changeCategory' WHERE id_sprzetu = $constIndexDev");
        mysqli_stmt_execute($updateDevice);

        header("Location: findByDevice.php");
    } 

    if(isset($_POST['confirmEmployee'])) {
        $constIndexEmp = $_POST['constIndexEmp'];
        $changeName = $_POST['changeName'];
        $changeLastName = $_POST['changeLastName'];
        $changeTelephone = $_POST['changeTelephone'];
        $changeEmail = $_POST['changeEmail'];

        $index = $constIndexEmp;

        $updateEmployee = mysqli_prepare($conn, "UPDATE pracownik SET imie_p = '$changeName', nazwisko_p = '$changeLastName', telefon_p = '$changeTelephone', email_p = '$changeEmail' WHERE id_pracownika = $constIndexEmp");
        mysqli_stmt_execute($updateEmployee);

        header("Location: findByDevice.php");
    }

    if(isset($_POST['confirmDepartment'])) {
        $constIndexDep = $_POST['constIndexDep'];
        $changeDepName = $_POST['changeDepName'];
        $changeDepStreet = $_POST['changeDepStreet'];
        $changeDepHouse = $_POST['changeDepHouse'];
        $changeDepLocal = $_POST['changeDepLocal'];
        $changeDepZipCode = $_POST['changeDepZipCode'];
        $changeDepTown = $_POST['changeDepTown'];
        $changeDepTelephone = $_POST['changeDepTelephone'];
        $changeDepEmail = $_POST['changeDepEmail'];

        $updateDepartment = mysqli_prepare($conn, "UPDATE oddzialy SET nazwa_od = '$changeDepName', ulica_od = '$changeDepStreet', numer_domu_od = '$changeDepHouse', numer_lokalu_od = '$changeDepLocal', kod_o = '$changeDepZipCode', miejscowosc_o = '$changeDepTown', telefon_o = '$changeDepTelephone', email_o = '$changeDepEmail' WHERE id_oddzialu = $constIndexDep");
        mysqli_stmt_execute($updateDepartment);

        header("Location: findByDevice.php");
    }


?>

<script src='js/findByEmpWindow.js'></script>