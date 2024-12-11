-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 sep 2023 om 12:52
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `address`) VALUES
(10, 'Leta Fields', '(305) 423-1448', 'leta.fields@example.com', '5546 Forest Ln'),
(11, 'Samuel Williams', '(502) 452-9742', 'samuel.williams@example.com', '5444 Avondale Ave'),
(12, 'Frederick Ramirez', '(258) 642-1905', 'frederick.ramirez@example.com', '8677 Forest Ln'),
(13, 'Ritthy Castillo', '(301) 379-4248', 'ritthy.castillo@example.com', '4027 Oak Ridge Ln'),
(14, 'Dustin Hunter', '(492) 428-9490', 'dustin.hunter@example.com', '8578 Pecan Acres Ln'),
(15, 'Howard Horton', '(952) 404-0203', 'howard.horton@example.com', '4006 Oak Lawn Ave'),
(16, 'Tiffany Carr', '(506) 542-6113', 'tiffany.carr@example.com', '6561 Royal Ln'),
(17, 'Avery Lowe', '(673) 393-5435', 'avery.lowe@example.com', '9448 Paddock Way');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
