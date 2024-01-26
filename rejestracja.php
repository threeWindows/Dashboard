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
        height: 550px;
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
    <form id="registrationForm" action="register.php" method="post">
    <div class="main">
        <h1>ZAREJESTRUJ SIĘ</h1>
        <div class="inputy">
            <label><p>Login: </p><input type="email" class="input" id="inp1" name="inp1" placeholder="Twój email"></label>
            <label><p>Hasło: </p><input type="password" class="input" id="inp2" name="inp2" placeholder="Twoje hasło"></label>
            <label><p>Data urodzenia: </p><input type="date" class="input" id="inp1"></label>
            <input type="submit" value="Zarejestruj się" class="button">
            <p>Masz już konto?</p>
            <p><a href="http://localhost/P/main.php">Zaloguj się</a></p>
        </div>
    </div>
</form>
</body>
</html>