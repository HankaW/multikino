<?php
require_once 'function.php';
$connect = get_sql();

$id_klienta = $_COOKIE['id'];

$rezerwacja = "SELECT * FROM rezerwacja WHERE ID_Klient = '$id_klienta'";
$result = mysqli_query($connect, $rezerwacja);
if ($result != '0') {
    $sala_rez = mysqli_fetch_assoc($result);
    $sala_rezerwacja = $sala_rez["ID_Sala"];


    $sala = "SELECT ID_Sala FROM rezerwacja WHERE ID_Sala = '$sala_rezerwacja'";
    $result_s = mysqli_query($connect, $sala);
    $sala_row = mysqli_fetch_assoc($result_s);
    $sala_id = $sala_row['ID_Sala'];

    $miejsce = " UPDATE miejsce SET czy_zajete = false WHERE ID_Sala = '$sala_id'";
    $result_m = mysqli_query($connect, $miejsce);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuń rezerwacje</title>
    <link rel="stylesheet" href="zmienRezerwacje.css">
</head>

<div class="naglowek">
        <ul>
            <li><a href="multikino.php">Strona główna </a></li>
            <li style="float:right"><a href="wyloguj.php">Wyloguj się</a></li>
        </ul>
    </div>
 
<body>
<div class="container">
    <h1>Usuń rezerwacje</h1>
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <form method='post' action='zmianRezerwacje2.php'>
            <table>
                <tr>
                    <th>Wybor</th>
                    <th>Identyfikator seansu:</th>
                    <th>Sala:</th>
                    <th>Data:</th>
                    <th>Godzina:</th>
                    <th>Ilosc biletow:</th>
                    <th>Miejsce:</th>
                    <th>Cena biletu:</th>
                    <th>Status:</th>
                </tr>
                <?php
                mysqli_data_seek($result, 0);
                while ($row = mysqli_fetch_assoc($result,)) { ?>
                    <tr>
                        <td><input type='radio' name='thisIDRezerwacja' value='<?= $row["ID_Rezerwacja"] ?>'></td>
                        <td><?= $row['ID_Seans'] ?></td>
                        <td><?= $row['ID_Sala'] ?></td>
                        <td><?= $row['data'] ?></td>
                        <td><?= $row['godzina'] ?></td>
                        <td><?= $row['ilosc_biletow'] ?></td>
                        <td><?= $row['miejsce'] ?></td>
                        <td><?= $row['cena'] ?></td>
                        <td><?php echo ($row['status'] == 0) ? "Nieopłacona" : "Opłacona"; ?></td>

                    </tr>
                <?php
                }
                ?>
            </table>
            <input type='submit' class="btn" value='Zatwierdź'>

        </form>
    <?php
    } else {
    ?>
        <p>Nie posiadasz żadnej rezerwacji...</p>
    <?php } ?>
    </div>
</body>

</html>