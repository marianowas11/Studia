-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql01.marianowas11.beep.pl:3306
-- Czas generowania: 17 Lis 2021, 15:27
-- Wersja serwera: 5.7.31-34-log
-- Wersja PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza_do_zadan`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `animacje`
--
DROP TABLE `animacje`;
CREATE TABLE `animacje` (
  `id` int(11) NOT NULL,
  `x0` int(11) NOT NULL,
  `y0` int(11) NOT NULL,
  `x_delta` int(11) NOT NULL,
  `y_delta` int(11) NOT NULL,
  `begin` int(11) NOT NULL,
  `diameter` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `color` text COLLATE utf8_polish_ci NOT NULL,
  `os` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `animacje`
--

INSERT INTO `animacje` (`id`, `x0`, `y0`, `x_delta`, `y_delta`, `begin`, `diameter`, `time`, `color`, `os`) VALUES
(1, 10, 10, 200, 10, 0, 10, 2, 'red', 'x'),
(2, 200, 10, 200, 200, 0, 10, 2, 'red', 'y'),
(3, 200, 200, 10, 200, 0, 10, 2, 'red', 'x'),
(4, 10, 200, 10, 10, 0, 10, 2, 'red', 'y'),
(5, 30, 30, 170, 30, 0, 10, 2, 'blue', 'x'),
(6, 170, 30, 170, 170, 0, 10, 2, 'blue', 'y'),
(7, 170, 170, 30, 170, 0, 10, 2, 'blue', 'x'),
(8, 30, 170, 30, 30, 0, 10, 2, 'blue', 'y'),
(9, 50, 50, 150, 50, 0, 10, 2, 'green', 'x'),
(10, 150, 50, 150, 150, 0, 10, 2, 'green', 'y'),
(11, 150, 150, 50, 150, 0, 10, 2, 'green', 'x'),
(12, 50, 150, 50, 50, 0, 10, 2, 'green', 'y'),
(13, 70, 70, 130, 70, 0, 10, 2, 'orange', 'x'),
(14, 130, 70, 130, 130, 0, 10, 2, 'orange', 'y'),
(15, 130, 130, 70, 130, 0, 10, 2, 'orange', 'x'),
(16, 70, 130, 70, 70, 0, 10, 2, 'orange', 'y');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `animacje`
--
ALTER TABLE `animacje`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
