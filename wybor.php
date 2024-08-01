<?php
require_once 'function.php';
$connect = get_sql();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $thisIDFilm = $_POST['thisIDFilm'];
    $seans = "SELECT * FROM seans WHERE ID_Film  = '$thisIDFilm'";
    $result = mysqli_query($connect, $seans);
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seans</title>
    <link rel="stylesheet" href="wybor.css">
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
        <h1>Wybierz seans:</h1>
        <form method='post' action='miejsce.php'>
            <table>
                <tr>
                    <th>Wybierz:</th>
                    <th>Data seansu:</th>
                    <th>Godzina:</th>
                    <th>Cena biletu [szt]:</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><input type='radio' name='thisIDSeans' value='<?= $row["ID_Seans"] ?>'></td>
                    <td><?= $row['data'] ?></td>
                    <td><?= $row['godzina'] ?></td>
                    <td><?= $row['cena'] ?> PLN</td>
                </tr>
                <?php
                }
                ?>
            </table>
            <input type='submit' class='btn' value='Zatwierdź'>
        </form>
    <?php
    } else {
    ?>
        <h1 class="body">Brak dostępnych seansów, przepraszamy!</h1>
    <?php
    }
    ?>
</div>

</body>

</html>
