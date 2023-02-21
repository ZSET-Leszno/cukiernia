-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Lut 2023, 10:22
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
(1, 'Kamil', 'Ślimak', 199267094, 'Garzyn', 'Kowalska', 10, 1),
(2, 'Michał', 'Ślimak', 987654321, 'Leszno', '3 Maja', 69, 0),
(3, 'Kamil', 'Pierwiastek', 576682359, 'Lipno', 'Jana Pawła 2', 3, 1),
(4, 'Jadwiga', 'Kurtz', 956041295, 'Wrocław', 'Kręta', 41, 0),
(5, 'Stanisław', 'Słowiański', 865745027, 'Leszno', 'Kwiatowa', 7, 1),
(6, 'Kamil', 'Janowski', 761951932, 'Kąkolewo', 'Rydzyńska', 28, 0),
(7, 'Olga', 'Czerniewicz', 955967813, 'Kościan', '3 Maja', 1, 0),
(8, 'Stanisław', 'Kurtz', 806654375, 'Leszno', 'Jana Sobieskiego', 69, 0),
(9, 'Anna', 'Pierwiastek', 763491278, 'Osieczna', 'Norwida', 33, 1),
(10, 'Jan', 'Czerniewicz', 760839554, 'Wrocław', 'Jana Sobieskiego', 28, 1);

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
(1, 'Michał', 'Adam', 'Kierownik', 234645785, 'Krzywiń', 4320),
(2, 'Janusz', 'Tracz', 'Menadżer', 696969420, 'Poznań', 43900),
(3, 'Jan', 'Kowalski', 'Pracownik', 879057841, 'Januszewo', 3400),
(4, 'Marian', 'Jakubiak', 'Pracownik', 705692306, 'Poznań', 2980),
(5, 'Michał', 'Kowalski', 'Kierownik', 960488639, 'Święciechowa', 4320),
(6, 'Zofia', 'Ptak', 'Pracownik', 572865049, 'Rydzyna', 3100),
(7, 'Jan', 'Lichwa', 'Menedżer', 918659648, 'Leszno', 38600),
(8, 'Paweł', 'Kowalski', 'Stażysta ', 603951860, 'Poznań', 1400),
(9, 'Agnieszka', 'Paź', 'Pracownik', 859069835, 'Pelikan', 3590),
(10, 'Janusz', 'Ptak', 'Pracownik', 968754387, 'Krzemieniewo', 3400);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(225) NOT NULL,
  `rodzaj` int(11) NOT NULL,
  `cena` float NOT NULL,
  `waga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `rodzaj`, `cena`, `waga`) VALUES
(5, 'Draże Korsarze', 5, 2.59, 120),
(6, 'Magdalenka', 4, 1.2, 20),
(7, 'Sernik', 2, 7.99, 400),
(8, 'Mrożona Gała', 5, 3.5, 50),
(9, 'Muffinek', 3, 9.89, 70),
(10, 'Tort Shrek', 1, 39.99, 5000),
(11, 'Cappuccino', 4, 4.99, 150),
(12, 'Jupiter', 2, 6.5, 250),
(13, 'Pieguski', 3, 2.99, 100),
(14, 'Makaroniki', 3, 4.99, 120);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
