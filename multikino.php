<?php
session_set_cookie_params(3600);
session_start();
require_once 'function.php';
$connect = get_sql();

$zalogowany = isset($_COOKIE['zalogowany']) ? $_COOKIE['zalogowany'] : 0;
$id_klienta = isset($_COOKIE['id']) ? $_COOKIE['id'] : null;

if ($zalogowany == 1 && $id_klienta) {
    $kto = "SELECT imie FROM klient WHERE ID_Klient = '$id_klienta'";
    $result = mysqli_query($connect, $kto);
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Witamy w Multikinie!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php if ($zalogowany == 0): ?>
        <div class="naglowek">
            <ul>
                <li><a href="multikino.php">Strona główna</a></li>
                <li style="float:right"><a href="login.php">Zaloguj się</a></li>
                <li style="float:right"><a href="register.php">Zarejestruj się</a></li>
            </ul>
        </div>
        <div class="glowna1">
            <h1>Multikino przedstawia:</h1>
            <div class="wrapper">
                <div class="media">
                    <div class="layer">
                        <p>Zobacz więcej po zalogowaniu się!</p>
                    </div>
                    <img src="film1.jpg" alt="" />
                </div>
                <div class="media">
                    <div class="layer">
                        <p>Zobacz więcej po zalogowaniu się!</p>
                    </div>
                    <img src="film2.jpg" alt="" />
                </div>
                <div class="media">
                    <div class="layer">
                        <p>Zobacz więcej po<br>zalogowaniu się!</p>
                    </div>
                    <img src="film3.jpg" alt="" />
                </div>
                <div class="media">
                    <div class="layer">
                        <p>Zobacz więcej po zalogowaniu się!</p>
                    </div>
                    <img src="film4.jpg" alt="" />
                </div>
                <div class="media">
                    <div class="layer">
                        <p>Zobacz więcej po zalogowaniu się!</p>
                    </div>
                    <img src="film5.jpg" alt="" />
                </div>
            </div>
        </div>
    <?php elseif ($zalogowany == 1): ?>
        <ul>
            <li><a href="multikino.php">Strona główna</a></li>
            <li style="float:right"><a href="wyloguj.php">Wyloguj się</a></li>
        </ul>

        <div class="glowna2">
            <div class="grid-container">
                <div class="grid-item"><a href="rezerwacje.php">Dokonaj rezerwacje</a></div>
                <div class="grid-item"><a href="aktywne.php">Wyświetl aktywne rezerwacje</a></div>
                <div class="grid-item"><a href="zmienRezerwacje.php">Usuń rezerwacje</a></div>
                <div class="grid-item"><a href="zmienDane.php">Zmien dane osobowe</a></div>
            </div>

            <div class="font">
                Cześć <?php if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo $row["imie"];
                        }
                        echo '!'; ?>
                <div class="fontsmall">
                    Miło cię widzieć w Multikinie!
                </div>
                <img src="film.jpg" alt="">
            </div>
        </div>
    <?php elseif ($zalogowany == 2): ?>
        <div class="naglowek">
        <ul>
            <li><a href="multikino.php">Strona główna</a></li>
            <li style="float:right"><a href="wyloguj.php">Wyloguj się</a></li>
        </ul>
        </div>
        <h1>Zalogowany jako pracownik!</h1>
        <div class="glowna3">
  
            <div class="grid-container">
                <div class="grid-item"><a href="pracownik.php">Wyświetl rezerwacje</a></div>
            </div>
        </div>
        
    <?php endif; ?>

</body>

</html>
