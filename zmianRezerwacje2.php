<?php
require_once 'function.php';
$connect = get_sql();

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['thisIDRezerwacja'])) {
    $_SESSION['thisIDRezerwacja'] = $_POST['thisIDRezerwacja']; 
    $thisIDRezerwacja = $_SESSION['thisIDRezerwacja'];

    $rezerwacja = "SELECT * FROM rezerwacja WHERE ID_Rezerwacja = '$thisIDRezerwacja'";
    $result = mysqli_query($connect, $rezerwacja);

    if (isset($_POST['submit'])) {
        if ($_POST['submit'] === 'Tak') {
            $deleteQuery = "DELETE FROM rezerwacja WHERE ID_Rezerwacja = '$thisIDRezerwacja'";
            mysqli_query($connect, $deleteQuery);
            header("Location: multikino.php");
            exit();
        } else {
            header("Location: multikino.php");      
          }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usunięcie rezerwacji</title>
    <link rel="stylesheet" href="zmienRezerwacje2.css">

</head>
<div class="naglowek">
        <ul>
            <li><a href="multikino.php">Strona główna </a></li>
            <li style="float:right"><a href="wyloguj.php">Wyloguj się</a></li>
        </ul>
    </div>
 
<body>
<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="thisIDRezerwacja" value="<?php echo $_SESSION['thisIDRezerwacja']; ?>">
        <label>Czy na pewno chcesz usunąć tę rezerwację?</label>
        <br>
        <input type="submit" class="btn" name="submit" value="Tak">
        <input type="submit" class="btn" name="submit" value="Nie">
    </form>
</body>
</html>
