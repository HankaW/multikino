<?php
require_once 'function.php';
$connect = get_sql();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ID_Rezerwacja'])) {
    $ID_Rezerwacja = $_POST['ID_Rezerwacja'];
    $current_ilosc_biletow = $_POST['ilosc_biletow'];
    $current_miejsce = $_POST['miejsce'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_ilosc_biletow'], $_POST['new_miejsce'])) {
        $new_ilosc_biletow = $_POST['new_ilosc_biletow'];
        $new_miejsce = $_POST['new_miejsce'];
        $updateQuery = "UPDATE rezerwacja SET ilosc_biletow='$new_ilosc_biletow', miejsce='$new_miejsce' WHERE ID_Rezerwacja='$ID_Rezerwacja'";
        if (mysqli_query($connect, $updateQuery)) {
            echo "Ilość biletów i miejsce zostały zaktualizowane.";
        } else {
            echo "Błąd podczas aktualizacji ilości biletów i miejsca: " . mysqli_error($connect);
        }
    }
} else {
    echo "Nie wybrano rezerwacji.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmień ilość biletów i miejsce</title>
</head>
<body>
    <h1>Zmień ilość biletów i miejsce</h1>
    <form method='post' action=''>
        <input type='hidden' name='ID_Rezerwacja' value='<?= $ID_Rezerwacja ?>'>
        <label for='new_ilosc_biletow'>Nowa ilość biletów:</label>
        <input type='number' id='new_ilosc_biletow' name='new_ilosc_biletow' value='<?= $current_ilosc_biletow ?>'><br>
        <label for='new_miejsce'>Nowe miejsce:</label>
        <input type='text' id='new_miejsce' name='new_miejsce' value='<?= $current_miejsce ?>'><br>
        <input type='submit' value='Zapisz zmiany'>
    </form>
    <a href="rezerwacje.php">Wróć do rezerwacji</a>
</body>
</html>
