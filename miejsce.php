<?php
require_once 'function.php';
$connect = get_sql();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['thisIDSeans'])) {
    $_SESSION['thisIDSeans'] = $_POST['thisIDSeans'];
}

$thisIDSeans = isset($_SESSION['thisIDSeans']) ? $_SESSION['thisIDSeans'] : null;
if (!is_null($thisIDSeans)) {

    $id_klienta = $_COOKIE['id'];

    $sala = "SELECT ID_Sala, data, godzina, cena FROM seans WHERE ID_Seans = '$thisIDSeans'";
    $result_s = mysqli_query($connect, $sala);
    $sala_row = mysqli_fetch_assoc($result_s);

    $sala_id = $sala_row['ID_Sala'];
    $data = $sala_row['data'];
    $godzina = $sala_row['godzina'];
    $cena = $sala_row['cena'];

    $miejsce = "SELECT * FROM miejsce WHERE ID_Sala = '$sala_id' AND czy_zajete = false ORDER BY ID_Miejsca ASC";
    $result_m = mysqli_query($connect, $miejsce);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['thisIDMiejsca'])) {

    $selectedPlaces = $_POST['thisIDMiejsca'];
    foreach ($selectedPlaces as $selected) {
        $nrMiejsca = "UPDATE miejsce SET czy_zajete = true WHERE ID_Miejsca = '$selected'";
        mysqli_query($connect, $nrMiejsca);
    }

    $selectedPlacesString = implode(",", $selectedPlaces); // Konwersja tablicy miejsc na string rozdzielony przecinkami

    $add = "INSERT INTO rezerwacja (ID_Klient, ID_Seans, ID_Sala, data, godzina, ilosc_biletow, miejsce, cena) VALUES ('$id_klienta', '$thisIDSeans', '$sala_id', '$data', '$godzina', '" . count($selectedPlaces) . "', '$selectedPlacesString', '$cena')";
    mysqli_query($connect, $add);

    header("Location: main.php?warning=7");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miejsce</title>
    <link rel="stylesheet" href="miejsce.css">

</head>

<body>

    <div class="naglowek">
        <ul>
            <li><a href="multikino.php">Strona główna </a></li>
            <li style="float:right"><a href="wyloguj.php">Wyloguj się</a></li>
        </ul>
    </div>
<div class="container">

        <?php
        if (!is_null($thisIDSeans) && mysqli_num_rows($result_m) > 0) {
        ?>

            <h1>Wybierz miejsce</h1>
            <form method='post' action='miejsce.php'>


                <table>

                    <?php
                    while ($row = mysqli_fetch_assoc($result_m)) {
                    ?>
                        <div class="seats-grid">

                            <input type="hidden" id="ilosc_biletow" name="ilosc_biletow" min="1">
                            <td><input type='checkbox' name='thisIDMiejsca[]' value='<?= $row['ID_Miejsca'] ?>'>
                                <?= $row['ID_Miejsca'] ?>
                            </td>

                        <?php
                    }
                        ?>
                        </div>
                </table>


                <input type='submit' value='Zatwierdź' $idx="1"><br>

            </form>

        <?php
        } else {
        ?>
            Brak dostępnych miejsc, przepraszamy!
        <?php
        }
        ?>
    </div>
</body>

</html>