<?php

    $constIndexEmp = $_POST['constIndexEmp'];
    $changeName = $_POST['changeName'];
    $changeLastName = $_POST['changeLastName'];
    $changeTelephone = $_POST['changeTelephone'];
    $changeEmail = $_POST['changeEmail'];

    $updateEmployee = mysqli_prepare($conn, "UPDATE pracownik SET imie_p = '$changeName', nazwisko_p = '$changeLastName', telefon_p = '$changeTelephone', email_p = '$changeEmail' WHERE id_pracownika = $constIndexEmp");
    mysqli_stmt_execute($updateEmployee);

?>