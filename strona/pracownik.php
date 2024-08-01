<?php
require_once 'function.php';
$connect = get_sql();

$rezerwacja = "SELECT * FROM rezerwacja";
$result = mysqli_query($connect, $rezerwacja);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktywne rezerwacje</title>
    <link rel="stylesheet" href="pracownik.css">

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
        if (mysqli_num_rows($result) > 0) {
        ?>
            <form method='post' action='bilet.php'>
                <table>
                    <tr>
                        <th>Akcja:</th>
                        <th>ID Rezerwacja:</th>
                        <th>ID Klienta:</th>
                        <th>Sala:</th>
                        <th>Data:</th>
                        <th>Godzina:</th>
                        <th>Ilość biletów:</th>
                        <th>Miejsce:</th>
                        <th>Cena biletu:</th>
                        <th>Status:</th>
                        <th>Wydruk biletu:</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td>
                            <?php if ($row['status'] == 1 && $row['bilety'] == 0) { ?>
                                    <input type='radio' name='thisIDRezerwacja' value='<?= $row["ID_Rezerwacja"] ?>'>
                                <?php } else { ?>
                                    <input type='radio' name='thisIDRezerwacja' value='<?= $row["ID_Rezerwacja"] ?>' disabled>
                                <?php } ?>
                            </td>
                            
                            <td><?= $row['ID_Rezerwacja'] ?></td>
                            <td><?= $row['ID_Klient'] ?></td>
                            <td><?= $row['ID_Sala'] ?></td>
                            <td><?= $row['data'] ?></td>
                            <td><?= $row['godzina'] ?></td>
                            <td><?= $row['ilosc_biletow'] ?></td>
                            <td><?= $row['miejsce'] ?></td>
                            <td><?= $row['cena'] ?></td>
                            <td><?php echo ($row['status'] == 0) ? "Nieopłacona" : "Opłacona"; ?></td>
                            <td><?php echo ($row['bilety'] == 0) ? "Nie wydrukowano" : "Wydrukowano"; ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
                <input type='submit' class="btn" value='Wygeneruj bilet'>
            </form>



        <?php
        } else {
        ?>
            Nie masz rezerwacji...
        <?php
        }
        ?>
    </div>
</body>

</html>