<?php
        if (isset($_GET['warning'])) {
            if ($_GET['warning'] == '1') {
                echo 'Nieprawidłowe hasło lub login <br><br>';
            }
            if ($_GET['warning'] == '2') {
                echo 'Nie znaleznino użytkownika <br><br>';
            }
            if ($_GET['warning'] == '3') {
                echo 'Podane hasła nie są identyczne! <br><br>';
            }
            if ($_GET['warning'] == '4') {
                echo 'Podany e-mail lub login jest już zajęty <br><br>';
            }
            if ($_GET['warning'] == '5') {
                echo 'Pomyślnie wylogowano <br><br>';
            }
            if ($_GET['warning'] == '6') {
                echo 'Zarejestrowano pomyślnie! <br><br>';
            }
            if ($_GET['warning'] == '7') {
                echo 'Dokonano rezerwacji! <br><br>';
            }
            if ($_GET['warning'] == '8') {
                echo 'Podano błędny kod blik! <br><br>';
            }
            if ($_GET['warning'] == '9') {
                echo 'Podano blędne hasło <br><br>';
            }
            
            
        }
        
        ?>
