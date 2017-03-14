-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2017 at 01:36 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `historic`
--

CREATE TABLE IF NOT EXISTS `historic` (
  `id` int(11) NOT NULL,
  `object` varchar(250) NOT NULL,
  `user` varchar(50) NOT NULL,
  `modification` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `reference` varchar(18) NOT NULL,
  `type` enum('Tennis','Running','Lifestyle','Basket','Skateboard') NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `plus` varchar(50) NOT NULL,
  `stock` enum('sell','stockonly') NOT NULL,
  `file` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `reference`, `type`, `price`, `quantity`, `description`, `plus`, `stock`, `file`, `date`) VALUES
(59, 'Air Force One', '0001', 'Lifestyle', 120, 150, 'La derniÃ¨re Air Force', '0', 'sell', '../../img/upload/air_force.jpg', '2017-03-14 01:27:38'),
(60, 'Air Max 90', '0002', 'Lifestyle', 110, 13, 'La paire de chaussure historique de Nike remise au goÃ»t du jourr', '0', 'sell', '../../img/upload/air_max90.jpg', '2017-03-14 01:28:57'),
(61, 'Adidas Enfant', '0003', 'Tennis', 50, 100, 'Paire de chaussure enfant', '0', 'stockonly', '../../img/upload/adidas_enfant.jpg', '2017-03-14 01:29:50'),
(62, 'Nike Huarache', '0004', 'Running', 95, 11, 'Sortie pour la premiÃ¨re fois en 1991, la chaussure Nike Air Huarache Premium pour Femme associe une empeigne lÃ©gÃ¨re composÃ©e de plusieurs matiÃ¨res et une unitÃ© Air-Sole au talon pour un amorti confortable.', '0', 'sell', '../../img/upload/huarache.jpg', '2017-03-14 01:31:26'),
(63, 'Adidas Tubular', '0005', 'Running', 120, 180, 'Remix futuriste de lâ€™emblÃ©matique Tubular, cette sneaker affiche une silhouette Ã©purÃ©e et des dÃ©tails audacieux.', '0', 'sell', '../../img/upload/tubular.jpg', '2017-03-14 01:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'admin', '616104ebd93e67ae20bac90c86483da3cae1ee5b1c1483f739372a88ff1e79f9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historic`
--
ALTER TABLE `historic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`,`name`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historic`
--
ALTER TABLE `historic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
