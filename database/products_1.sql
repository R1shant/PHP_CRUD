-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 okt 2023 om 11:11
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
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_type_code` int(16) NOT NULL,
  `supplier_id` int(16) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `product_price` decimal(4,2) NOT NULL,
  `other_product_details` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES
(16, 2, 2, 'Blacka', '2.50', 'blacka coffee'),
(17, 2, 2, 'Espresso', '3.75', 'Strong and concentrated coffee'),
(18, 2, 2, 'Cappuccino', '4.20', 'Espresso with steamed milk and foam'),
(19, 2, 2, 'Americano', '2.75', 'Diluted espresso with hot water'),
(20, 1, 1, 'Glazed Donut', '1.50', 'Classic glazed donut'),
(21, 1, 1, 'Chocolate Donut', '1.75', 'Donut with chocolate frosting'),
(22, 1, 1, 'Sprinkle Donut', '2.00', 'Donut with colorful sprinkles'),
(23, 2, 2, 'Latte', '4.80', 'Espresso with steamed milk'),
(24, 2, 2, 'Mocha', '4.50', 'Espresso with chocolate and steamed milk'),
(25, 1, 2, 'Jelly Donut', '2.25', 'Donut filled with fruity jelly'),
(26, 1, 1, 'Iced Coffee', '3.20', 'Chilled coffee on ice'),
(27, 1, 1, 'Plain Donut', '1.25', 'Simple and classic plain donut'),
(28, 2, 2, 'Macchiato', '3.50', 'Espresso with a dash of steamed milk'),
(29, 1, 1, 'Coconut Donut', '2.80', 'Donut with coconut flakes'),
(30, 2, 2, 'Flat White', '4.90', 'Espresso with velvety microfoam');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
