-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 11:31 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multikino`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kasjer`
--

CREATE TABLE `kasjer` (
  `ID_Kasjer` varchar(100) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `wiek` int(3) DEFAULT NULL,
  `miasto` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `stawka_godzinowa` float NOT NULL,
  `login` varchar(100) NOT NULL,
  `haslo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasjer`
--

INSERT INTO `kasjer` (`ID_Kasjer`, `imie`, `nazwisko`, `wiek`, `miasto`, `email`, `stawka_godzinowa`, `login`, `haslo`) VALUES
('K_1', 'Kacper', 'Warmowski', 22, 'Bydgoszcz', 'kacperwarmowski@o2.pl', 35.1, 'K_1', '$2y$10$jvbWAc/TYjfaZ42u0CvfE.wq8DnNbZE26zFSM/T8.tztqczjGNbHW');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `ID_Klient` varchar(100) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `haslo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`ID_Klient`, `imie`, `nazwisko`, `email`, `login`, `haslo`) VALUES
('Kl_2', 'hanka', 'Wójcicka', 'wojcicka.hania@gmail.com', 'hanka', '$2y$10$jvbWAc/TYjfaZ42u0CvfE.wq8DnNbZE26zFSM/T8.tztqczjGNbHW'),
('Kl_3', 'Roksana', 'Orłowska', 'roksanaorzeł@o2.pl', 'roski', '$2y$10$S4/xgG79jjHvLa/IxNXTvOgoZZSZOITVsonWmj.3VyPPaYNFsRD8y'),
('Kl_4', 'Hanna', 'sdasd', 'wojcicka.hania@gmail.com', 'han', '$2y$10$X5CsT8emNNvQBhY6PhDJ6ei5425IwKE3f5gdqBIPcKlr2I/EPbggO'),
('Kl_5', 'agnieszka', 'w', 'aga@gmail.com', 'aga', '$2y$10$znXiABV1fCt2nJYBQsacRecLQjr7SgeLKc/FjoI7YDx5AHWoGd6mu');

--
-- Wyzwalacze `klient`
--
DELIMITER $$
CREATE TRIGGER `generate_Kl_index` BEFORE INSERT ON `klient` FOR EACH ROW BEGIN
    DECLARE new_id INT;
    DECLARE prefix VARCHAR(10);
    SET prefix = 'Kl_';
    
    -- Sprawdź, czy tabela jest pusta, aby ustawić nowe ID na 1
    IF (SELECT COUNT(*) FROM klient) = 0 THEN
        SET new_id = 1;
    ELSE
        -- W przeciwnym razie pobierz maksymalne ID i zwiększ je o 1
        SELECT MAX(SUBSTRING(ID_Klient, LENGTH(prefix) + 1)) INTO new_id FROM klient WHERE ID_Klient LIKE CONCAT(prefix, '%');
        SET new_id = new_id + 1;
    END IF;
    
    -- Ustaw nowy ID_Klient
    SET NEW.ID_Klient = CONCAT(prefix, new_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejsce`
--

CREATE TABLE `miejsce` (
  `ID_Miejsca` int(11) NOT NULL,
  `ID_Sala` varchar(100) NOT NULL,
  `czy_zajete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `miejsce`
--

INSERT INTO `miejsce` (`ID_Miejsca`, `ID_Sala`, `czy_zajete`) VALUES
(1, 'S_1', 1),
(2, 'S_1', 1),
(3, 'S_1', 1),
(4, 'S_1', 1),
(5, 'S_1', 1),
(6, 'S_1', 0),
(7, 'S_1', 0),
(8, 'S_1', 0),
(9, 'S_1', 0),
(10, 'S_1', 0),
(11, 'S_1', 0),
(12, 'S_1', 0),
(13, 'S_1', 0),
(14, 'S_1', 0),
(15, 'S_1', 0),
(16, 'S_1', 0),
(17, 'S_1', 0),
(18, 'S_1', 0),
(19, 'S_1', 0),
(20, 'S_1', 0),
(21, 'S_1', 0),
(22, 'S_1', 0),
(23, 'S_1', 0),
(24, 'S_1', 0),
(25, 'S_1', 0),
(26, 'S_1', 0),
(27, 'S_1', 0),
(28, 'S_1', 0),
(29, 'S_1', 0),
(30, 'S_1', 0),
(31, 'S_2', 0),
(32, 'S_2', 0),
(33, 'S_2', 0),
(34, 'S_2', 0),
(35, 'S_2', 0),
(36, 'S_2', 0),
(37, 'S_2', 0),
(38, 'S_2', 0),
(39, 'S_2', 0),
(40, 'S_2', 0),
(41, 'S_2', 0),
(42, 'S_2', 0),
(43, 'S_2', 0),
(44, 'S_2', 0),
(45, 'S_2', 0),
(46, 'S_2', 0),
(47, 'S_2', 0),
(48, 'S_2', 0),
(49, 'S_2', 0),
(50, 'S_2', 0),
(51, 'S_3', 1),
(52, 'S_3', 0),
(53, 'S_3', 0),
(54, 'S_3', 0),
(55, 'S_3', 0),
(56, 'S_3', 0),
(57, 'S_3', 0),
(58, 'S_3', 0),
(59, 'S_3', 1),
(60, 'S_3', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `repertuar`
--

CREATE TABLE `repertuar` (
  `ID_Film` varchar(11) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `gatunek` varchar(100) NOT NULL,
  `dlugosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repertuar`
--

INSERT INTO `repertuar` (`ID_Film`, `tytul`, `gatunek`, `dlugosc`) VALUES
('F_1', 'Pajęcza sieć', 'Dreszczowiec', 136),
('F_2', 'Kicia kocia', 'Bajka', 130),
('F_3', 'Shrek ', 'Bajka', 96),
('F_4', 'Magiczne drzewo', 'Fantasy', 158),
('F_5', 'Napoleon', 'Historyczny', 128),
('F_6', 'Królestwo Planety Małp', 'Akcja', 99),
('F_7', 'Niepokonany', 'Dramat', 83);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `ID_Rezerwacja` int(11) NOT NULL,
  `ID_Klient` varchar(100) NOT NULL,
  `ID_Seans` varchar(100) NOT NULL,
  `ID_Sala` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `godzina` varchar(100) NOT NULL,
  `ilosc_biletow` int(11) NOT NULL,
  `miejsce` varchar(100) NOT NULL,
  `cena` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `bilety` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezerwacja`
--

INSERT INTO `rezerwacja` (`ID_Rezerwacja`, `ID_Klient`, `ID_Seans`, `ID_Sala`, `data`, `godzina`, `ilosc_biletow`, `miejsce`, `cena`, `status`, `bilety`) VALUES
(1, 'Kl_2', 'SE_13', 'S_1', '2024-05-26', '16.30', 1, '1', '12.00', 1, 1),
(6, 'Kl_2', 'SE_13', 'S_1', '2024-05-26', '16.30', 2, '1,2', '12.00', 1, 1),
(7, 'Kl_3', 'SE_12', 'S_1', '2024-05-26', '09.30', 1, '3', '11.50', 1, 1),
(10, 'Kl_2', 'SE_12', 'S_1', '2024-05-26', '09.30', 1, '12', '11.50', 1, 1),
(11, 'Kl_2', 'SE_17', 'S_1', '2024-05-07', '17.30', 1, '15', '14.50', 1, 1),
(12, 'Kl_2', 'SE_1', 'S_1', '2024-05-14', '18.00', 2, '1,2', '20.50', 0, 0),
(13, 'Kl_2', 'SE_13', 'S_1', '2024-05-26', '16.30', 3, '1,2,3', '12.00', 0, 0),
(14, 'Kl_2', 'SE_13', 'S_1', '2024-05-26', '16.30', 1, '4', '12.00', 0, 0),
(15, 'Kl_2', 'SE_19', 'S_1', '2024-06-09', '14.00', 1, '5', '23.50', 0, 0);

--
-- Wyzwalacze `rezerwacja`
--
DELIMITER $$
CREATE TRIGGER `set_ID_Rezerwacja` BEFORE INSERT ON `rezerwacja` FOR EACH ROW BEGIN
    DECLARE last_id INT;
    DECLARE next_id INT;

    -- Znajdź ostatnią wartość ID_Rezerwacji
    SELECT MAX(ID_Rezerwacja) INTO last_id FROM Rezerwacja;

    -- Ustaw nową wartość ID_Rezerwacji
    SET next_id = IF(last_id IS NULL, 1, last_id + 1);
    SET NEW.ID_Rezerwacja = next_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sala`
--

CREATE TABLE `sala` (
  `ID_Sala` varchar(100) NOT NULL,
  `ilosc_miejsc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`ID_Sala`, `ilosc_miejsc`) VALUES
('S_1', 30),
('S_2', 20),
('S_3', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seans`
--

CREATE TABLE `seans` (
  `ID_Seans` varchar(100) NOT NULL,
  `ID_Sala` varchar(100) NOT NULL,
  `ID_Film` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `godzina` varchar(100) NOT NULL,
  `cena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seans`
--

INSERT INTO `seans` (`ID_Seans`, `ID_Sala`, `ID_Film`, `data`, `godzina`, `cena`) VALUES
('SE_1', 'S_1', 'F_2', '2024-05-14', '18.00', '20.50'),
('SE_10', 'S_2', 'F_6', '2024-05-19', '17.00', '23.50'),
('SE_12', 'S_1', 'F_3', '2024-05-26', '09.30', '11.50'),
('SE_13', 'S_1', 'F_1', '2024-05-26', '16.30', '12.00'),
('SE_15', 'S_3', 'F_7', '2024-06-05', '19.00', '19.90'),
('SE_16', 'S_2', 'F_5', '2024-06-04', '14.50', '15.50'),
('SE_17', 'S_1', 'F_2', '2024-05-07', '17.30', '14.50'),
('SE_18', 'S_2', 'F_3', '2024-06-04', '16.00', '18.90'),
('SE_19', 'S_1', 'F_1', '2024-06-09', '14.00', '23.50'),
('SE_20', 'S_3', 'F_7', '2024-05-31', '19.00', '18.50'),
('SE_3', 'S_2', 'F_1', '2024-05-14', '12.00', '23.00'),
('SE_4', 'S_3', 'F_1', '2024-06-01', '14.30', '32.90'),
('SE_5', 'S_2', 'F_4', '2024-05-21', '19.00', '23.90'),
('SE_6', 'S_3', 'F_6', '2024-05-27', '11.00', '19.90'),
('SE_7', 'S_1', 'F_3', '2024-05-15', '13.00', '25.90'),
('SE_8', 'S_2', 'F_2', '2024-05-17', '15.30', '28.50'),
('SE_9', 'S_3', 'F_1', '2024-05-16', '10.30', '17.50');

--
-- Wyzwalacze `seans`
--
DELIMITER $$
CREATE TRIGGER `set_SE_index` BEFORE INSERT ON `seans` FOR EACH ROW BEGIN
    DECLARE current_count INT;
    DECLARE new_index VARCHAR(20);

    -- Pobierz aktualną liczbę rekordów w tabeli Seans
    SELECT COUNT(*) INTO current_count FROM Seans;

    -- Wygeneruj nowy indeks w formacie SE_1, SE_2, itd.
    SET new_index = CONCAT('SE_', current_count + 1);

    -- Ustaw nowy indeks dla nowego rekordu
    SET NEW.ID_Seans = new_index;
END
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kasjer`
--
ALTER TABLE `kasjer`
  ADD PRIMARY KEY (`ID_Kasjer`);

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`ID_Klient`);

--
-- Indeksy dla tabeli `miejsce`
--
ALTER TABLE `miejsce`
  ADD PRIMARY KEY (`ID_Miejsca`),
  ADD KEY `ID_Sala` (`ID_Sala`);

--
-- Indeksy dla tabeli `repertuar`
--
ALTER TABLE `repertuar`
  ADD PRIMARY KEY (`ID_Film`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`ID_Rezerwacja`),
  ADD KEY `klient` (`ID_Klient`),
  ADD KEY `sala` (`ID_Sala`),
  ADD KEY `seans` (`ID_Seans`),
  ADD KEY `miejsce` (`miejsce`);

--
-- Indeksy dla tabeli `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`ID_Sala`);

--
-- Indeksy dla tabeli `seans`
--
ALTER TABLE `seans`
  ADD PRIMARY KEY (`ID_Seans`),
  ADD KEY `ID_Sala` (`ID_Sala`),
  ADD KEY `film` (`ID_Film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `ID_Rezerwacja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `miejsce`
--
ALTER TABLE `miejsce`
  ADD CONSTRAINT `miejsce_ibfk_1` FOREIGN KEY (`ID_Sala`) REFERENCES `sala` (`ID_Sala`);

--
-- Constraints for table `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD CONSTRAINT `klient` FOREIGN KEY (`ID_Klient`) REFERENCES `klient` (`ID_Klient`),
  ADD CONSTRAINT `sala` FOREIGN KEY (`ID_Sala`) REFERENCES `sala` (`ID_Sala`),
  ADD CONSTRAINT `seans` FOREIGN KEY (`ID_Seans`) REFERENCES `seans` (`ID_Seans`);

--
-- Constraints for table `seans`
--
ALTER TABLE `seans`
  ADD CONSTRAINT `film` FOREIGN KEY (`ID_Film`) REFERENCES `repertuar` (`ID_Film`),
  ADD CONSTRAINT `seans_ibfk_1` FOREIGN KEY (`ID_Sala`) REFERENCES `sala` (`ID_Sala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
