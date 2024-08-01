<?php
require_once 'function.php';
$connect = get_sql();

$film = "SELECT * FROM repertuar";
$result = mysqli_query($connect, $film);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repertuar</title>
    <link rel="stylesheet" href="rezerwacje.css">
</head>

<body>

<div class="naglowek">
    <ul>
        <li><a href="multikino.php">Strona główna</a></li>
        <li style="float:right"><a href="wyloguj.php">Wyloguj się</a></li>
    </ul>
</div>

<div class="container">
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <h1>Wybierz film:</h1>
        <form class="films-container" method='post' action='wybor.php'>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $imagePath = "zdj" . $i . ".jpg";
            ?>
                <div class="film">
                    <input type='radio' id='film<?= $row["ID_Film"] ?>' name='thisIDFilm' value='<?= $row["ID_Film"] ?>'>
                    <label for='film<?= $row["ID_Film"] ?>'>
                        <img src='<?= $imagePath ?>' alt='Film <?= $i ?>'>
                        <div class="film-info">
                            <p><strong>Tytuł:</strong> <?= $row["tytul"] ?></p>
                            <p><strong>Gatunek:</strong> <?= $row["gatunek"] ?></p>
                            <p><strong>Długość:</strong> <?= $row["dlugosc"] ?> min</p>
                        </div>
                    </label>
                </div>
            <?php
                $i++;
            }
            ?>
            <div class="submit-section">
                <input type='submit' class='btn' value='Zatwierdź'>
            </div>
        </form>
    <?php
    } else {
    ?>
        <h1>Brak dostępnych filmów, przepraszamy!</h1>
    <?php
    }
    ?>
</div>

</body>

</html>
