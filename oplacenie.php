<?php
require_once 'function.php';
$connect = get_sql();

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['thisIDRezerwacja'])) {
    $_SESSION['thisIDRezerwacja'] = $_POST['thisIDRezerwacja']; 

    $thisIDRezerwacja = $_SESSION['thisIDRezerwacja'];
    $updateQuery = "UPDATE rezerwacja SET status = 1 WHERE ID_Rezerwacja = '$thisIDRezerwacja'";
    mysqli_query($connect, $updateQuery);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmiana statusu rezerwacji</title>
    <link rel="stylesheet" href="oplacenie.css">

    <script>
        function validateBLIK() {
            var blikInput = document.getElementById('blik');
            var blikValue = blikInput.value.trim();

            // Sprawdzenie czy BLIK ma dokładnie 6 cyfr i czy są to cyfry
            if (blikValue.length === 6 && /^\d+$/.test(blikValue)) {
                return true; // BLIK jest poprawny
            } else {
                alert("Kod BLIK musi składać się z dokładnie 6 cyfr.");
                return false; // BLIK nie jest poprawny
            }
        }
    </script>
</head>
<body>
<div class="naglowek">
        <ul>
            <li><a href="multikino.php">Strona główna </a></li>
            <li style="float:right"><a href="wyloguj.php">Wyloguj się</a></li>
        </ul>
    </div>
    <form method="post" action="aktywne.php" onsubmit="return validateBLIK();">
    <div class="container">
        <input type="hidden" name="thisIDRezerwacja" value="<?php echo $_SESSION['thisIDRezerwacja']; ?>">
        <label for="blik">Wprowadź kod BLIK (6 cyfr):</label><br>
        <div class="przerwa">
        <input type="text" id="blik" name="blik" maxlength="6" required><br>
        <input type="submit" class="btn" value="Zatwierdź">
        </div>
        </div>
    </form>
</body>
</html>
