<?php
require_once('function.php');
$connect = get_sql();

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_klienta = $_COOKIE['id'];
    $imie = $_POST["name"];
    $nazwisko = $_POST["lastname"];
    $poczta = $_POST["email"];
    $logowanie = $_POST["login"];
    $password = $_POST["haslo"];
    $confirm_password = $_POST["confirmPassword"];

    if (isset($_POST['submit_name']) && !empty($_POST['name'])) {
        $imie = $_POST["name"];
        $updateImie = "UPDATE klient SET imie='$imie' WHERE ID_Klient='$id_klienta'";
        $result = $connect->query($updateImie);
    }

    if (isset($_POST['submit_lastname']) && !empty($_POST['lastname'])) {
        $nazwisko = $_POST["lastname"];
        $updateNazwisko = "UPDATE klient SET nazwisko='$nazwisko' WHERE ID_Klient='$id_klienta'";
        $result = $connect->query($updateNazwisko);
    }

    if (isset($_POST['submit_email']) && !empty($_POST['email'])) {
        $poczta = $_POST["email"];
        $updatePoczta = "UPDATE klient SET email='$poczta' WHERE ID_Klient='$id_klienta'";
        $result = $connect->query($updatePoczta);
    }

    if (isset($_POST['submit_login']) && !empty($_POST['login'])) {
        $poczta = $_POST["login"];
        $updateLogin = "UPDATE klient SET login='$logowanie' WHERE ID_Klient='$id_klienta'";
        $result = $connect->query($updateLogin);
    }

    if (isset($_POST['submit_password']) && !empty($_POST['haslo'])) {
        $poczta = $_POST["haslo"];
        $poczta = $_POST["confirmPassword"];
        if ($password === $confirm_password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $updatePassword = "UPDATE klient SET haslo='$hash' WHERE ID_Klient='$id_klienta'";
            $result = $connect->query($updatePassword);
        } else {
            header("Location: zmienDane.php?warning=3");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmiana danych osobowych</title>
    <link rel="stylesheet" href="zmienDane.css">
</head>

<body>
<div class="naglowek">
    <ul>
        <li><a href="multikino.php">Strona główna </a></li>
        <li style="float:right"><a href="wyloguj.php">Wyloguj się</a></li>
    </ul>
</div>

    <div class="body">
        <div class="wrapper">
            <h1>Zmiana danych osobowych:</h1>
            <form method="post" action="zmienDane.php">

                <div class="input-box">
                    <input type="text" id="name" name="name" placeholder="podaj imię">
                    <input type="submit" class="btn" name="submit_name" value="Zmień imię">
                </div>

                <div class="input-box">
                    <input type="text" id="lastname" name="lastname" placeholder="podaj nazwisko">
                    <input type="submit" class="btn"name="submit_lastname" value="Zmień nazwisko">
                </div>

                <div class="input-box">
                    <input type="text" id="email" name="email" placeholder="podaj adres e-mail">
                    <input type="submit" class="btn" name="submit_email" value="Zmień email">
                </div>

                <div class="input-box">
                    <input type="text" id="login" name="login" placeholder="podaj login">
                    <input type="submit" class="btn" name="submit_login" value="Zmień login">
                </div>

                <div class="input-box">
                    <input type="password" id="haslo" name="haslo" placeholder="podaj hasło">
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="powtórz hasło"> 
                    <input class="btn" type="submit"  name="submit_password" value="Zmień hasło">
                    
                </div>

                <?php
                include 'warnings.php'
                ?>

            </form>
          
        </div>
    </div>
</body>

</html>