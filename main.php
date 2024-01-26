<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        align-items: center;
        justify-content: center;
        background-color: aliceblue;
    }
    .main{
        justify-content: center;
        align-items: center;
        width: 50%;
        height: 500px;
        border: 2px solid black;
        margin-left: 25%;
        margin-right: 25%;
        margin-top: 100px;
        border-radius: 10px;
        background-color: rgb(255, 255, 255);
    }
    h1{
        text-align: center;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        margin-top: 60px;
    }
    .input{
        width: 300px;
        height: 30px;
        display: list-item;
        margin-left: 35%;
        border-radius: 10px;
    }
    .inputy{
        width: 100%;
        height: 70%;
    }
    label{
        text-align: center;
        justify-content: center;
    }
    p{
        text-align: center;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .button{
        width: 200px;
        height: 30px;
        margin-top: 30px;
        margin-left: 40%;
        border-radius: 10px;
        color: white;
        background-color: grey;
    }
</style>
<body>
    <?php
    
    //generowanie tokenu i zapisanie go w sesji
    session_start();
    if(!isset($_SESSION['log_token']))
    {
        $_SESSION['log_token']=bin2hex(random_bytes(32));
        echo $_SESSION['log_token'];
    }
    
    ?>
    <div class="main">
        <h1>ZALOGUJ SIĘ</h1>
        <div class="inputy">
            <form action="loginUser.php" method="post">
            <label><p>Login: </p><input type="text" class="input" id="inp1" name="inp1" placeholder="Twój email"></label>
            <label><p>Hasło: </p><input type="password" class="input" id="inp2" name="inp2" placeholder="Twoje hasło"></label>
            <input type="hidden" name="loginToken" value="<?php echo $_SESSION['log_token']; ?>">
            <input type="submit" value="Zaloguj się" class="button">
            <p>Nie masz jeszcze konta?</p>
            <p><a href="http://localhost/P/rejestracja.php">Zajerestruj się</a></p>
        </form>
        </div>
    </div>
</body>
</html>