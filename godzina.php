<?php
require_once 'function.php';
$connect = get_sql();

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['thisIDRezerwacja'])) {
    $_SESSION['thisIDRezerwacja'] = $_POST['thisIDRezerwacja'];

    $thisIDRezerwacja = $_SESSION['thisIDRezerwacja'];
    $rezerwacja = "SELECT * FROM rezerwacja WHERE ID_Rezerwacja = '$thisIDRezerwacja'";
    $result = mysqli_query($connect, $rezerwacja);
} else {
    echo "Nie wybrano rezerwacji.";
    exit;
}

// Pobierz unikalne godziny rezerwacji dla konkretnego filmu
$thisIDFilm = $_POST['thisIDFilm']; // ID wybranego filmu
$godziny_query = "SELECT DISTINCT godzina FROM rezerwacja WHERE ID_Film = '$thisIDFilm'";
$godziny_result = mysqli_query($connect, $godziny_query);
$godziny = array();
while ($row = mysqli_fetch_assoc($godziny_result)) {
    $godziny[] = $row['godzina'];
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmiana godziny rezerwacji</title>
</head>
<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>
        <h1>Zmiana godziny rezerwacji</h1>
        <form method='post' action='update_godzina.php'>
            <input type='hidden' name='thisIDRezerwacja' value='<?= $row["ID_Rezerwacja"] ?>'>
            <p>Aktualna godzina rezerwacji: <?= $row["godzina"] ?></p>
            <label for='new_godzina'>Nowa godzina:</label>
            <select id='new_godzina' name='new_godzina' required>
                <?php foreach ($godziny as $godzina) { ?>
                    <option value="<?= $godzina ?>"><?= $godzina ?></option>
                <?php } ?>
            </select><br>
            <input type='submit' value='Zmień godzinę'>
        </form>
    <?php
    } else {
        echo "Nie znaleziono rezerwacji.";
    }
    ?>
</body>
</html>
