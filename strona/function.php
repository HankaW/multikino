<?php

function get_sql(){
    $servername = "localhost";
    $username = "root";
    $passworddb = "";
    $dbname = "multikino";

    // Utwórz połączenie z bazą danych
    $connect = new mysqli($servername, $username, $passworddb, $dbname);
    if ($connect->connect_error) {
        die("Nie nawiązano połączenia z bazą: " . $connect->connect_error);

    }
    return $connect;
}

?>
