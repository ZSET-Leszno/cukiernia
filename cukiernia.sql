-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Lut 2023, 13:59
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cukiernia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` int(11) NOT NULL,
  `imie` varchar(225) NOT NULL,
  `nazwisko` varchar(225) NOT NULL,
  `num_tel` int(11) NOT NULL,
  `miasto` varchar(225) NOT NULL,
  `ulica` varchar(225) NOT NULL,
  `nr_domu` int(11) NOT NULL,
  `czy_stały` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `imie`, `nazwisko`, `num_tel`, `miasto`, `ulica`, `nr_domu`, `czy_stały`) VALUES
(1, 'Kamil', 'Ślimak', 123456789, 'Garzyn', 'Kowalska', 10, 1),
(2, 'Michał', 'Ślimak', 987654321, 'Leszno', '3 Maja', 69, 0),
(3, 'Kamil', 'Pierwiastek', 576682359, 'Lipno', 'Jana Pawła 2', 3, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(225) NOT NULL,
  `nazwisko` varchar(225) NOT NULL,
  `posada` varchar(225) NOT NULL,
  `num_tel` int(11) NOT NULL,
  `miasto` varchar(225) NOT NULL,
  `wypłata` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id`, `imie`, `nazwisko`, `posada`, `num_tel`, `miasto`, `wypłata`) VALUES
(1, 'Michał', 'Adam', 'Kierownik', 234645785, 'Krzywiń', 1240),
(2, 'Janusz', 'Tracz', 'Menadżer', 696969420, 'Poznań', 43900),
(3, 'Jan', 'Kowalski', 'Pracownik', 11119, 'Janiszewo', 100);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(225) NOT NULL,
  `rodzaj` int(11) NOT NULL,
  `cena` float NOT NULL,
  `waga` int(11) NOT NULL,
  `obraz` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `rodzaj`, `cena`, `waga`, `obraz`) VALUES
(5, 'Draże Korsarze', 5, 2.59, 120, ''),
(6, 'Magdalenka', 4, 1.2, 20, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaje`
--

CREATE TABLE `rodzaje` (
  `id` int(11) NOT NULL,
  `rodzaj` varchar(255) NOT NULL,
  `czy_na_wynos` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `rodzaje`
--

INSERT INTO `rodzaje` (`id`, `rodzaj`, `czy_na_wynos`) VALUES
(1, 'tort', 1),
(2, 'ciasto deserowe', 1),
(3, 'ciastko', 1),
(4, 'kawa', 0),
(5, 'lody', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamówienia`
--

CREATE TABLE `zamówienia` (
  `id` int(11) NOT NULL,
  `zawartość` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamówienia`
--

INSERT INTO `zamówienia` (`id`, `zawartość`) VALUES
(1, '2 Magdalenki, 3 Draże Korsarze, 1 Orzechowa historia'),
(2, '1 Orzechowa historia'),
(3, '2 Magdalenki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamówienia_info`
--

CREATE TABLE `zamówienia_info` (
  `id` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_zamówienia` int(11) NOT NULL,
  `data_zamówienia` date NOT NULL,
  `data_wykonania` date DEFAULT NULL,
  `cena_dostawy` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamówienia_info`
--

INSERT INTO `zamówienia_info` (`id`, `id_klienta`, `id_zamówienia`, `data_zamówienia`, `data_wykonania`, `cena_dostawy`) VALUES
(1, 1, 3, '2023-02-14', '2023-02-14', 2.5),
(2, 2, 1, '2023-02-14', '2023-02-16', 2.5),
(3, 3, 2, '2023-01-10', '2023-02-18', 2.5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rodzaj` (`rodzaj`);

--
-- Indeksy dla tabeli `rodzaje`
--
ALTER TABLE `rodzaje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamówienia`
--
ALTER TABLE `zamówienia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamówienia_info`
--
ALTER TABLE `zamówienia_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_zamówienia` (`id_zamówienia`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `rodzaje`
--
ALTER TABLE `rodzaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `zamówienia`
--
ALTER TABLE `zamówienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zamówienia_info`
--
ALTER TABLE `zamówienia_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`rodzaj`) REFERENCES `rodzaje` (`id`);

--
-- Ograniczenia dla tabeli `zamówienia_info`
--
ALTER TABLE `zamówienia_info`
  ADD CONSTRAINT `zamówienia_info_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`),
  ADD CONSTRAINT `zamówienia_info_ibfk_2` FOREIGN KEY (`id_zamówienia`) REFERENCES `zamówienia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
