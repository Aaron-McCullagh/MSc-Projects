-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2021 at 09:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amccullagh06`
--

-- --------------------------------------------------------

--
-- Table structure for table `UserAccounts`
--

CREATE TABLE `UserAccounts` (
  `id` int(11) NOT NULL,
  `Title` varchar(10) NOT NULL,
  `UserName` varchar(250) DEFAULT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `City` varchar(250) NOT NULL,
  `Telephone` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserAccounts`
--

INSERT INTO `UserAccounts` (`id`, `Title`, `UserName`, `Email`, `Password`, `Address`, `City`, `Telephone`) VALUES
(37, 'Mr', 'Jurgen Klopp', 'jurgenklopp@outlook.com', '$2y$10$xA7aKTc1e62FCELX8UZWf.Yfgzc58W/Oz4SXhGEjbd0goe25j1zBG', '5 Liverpool St', 'Liverpool', '07718349251'),
(40, 'Mr', 'Allison Becker', 'abecker@outlook.com', '$2y$10$t30dYVYLQJwidvI4yQrXQ./yniZ9GmGK3Mn2fr0yZ0hkD2wtKkbxe', '1 Liverpool st', 'Liverpool', '07712965420'),
(41, 'Mr', 'Joel Matip', 'jmatip@outlook.com', '$2y$10$vBw0dtIB7K4ctWG7Yg81yOrZlcnW4vuVBxb.Ss.PS8YfspMguIJLK', '4 Liverpool st', 'Liverpool', '07734510952'),
(42, 'Mr', 'Andrew Robertson', 'arobertson@outlook.com', '$2y$10$maOyH.pyDagaGtLa9mtsleb.gSiLMcd90DuCFXf2g8VLc2/es3G8q', '26 Liverpool st', 'Liverpool', '07735123801'),
(44, 'Mr', 'Trent Arnold', 'trentarnold@outlook.com', '$2y$10$6F0XPch10pXuuaZEyS44nO.NkgkTYR97rgCFFVmkHT.BajYSyJnni', '15 westway road', 'Belfast', '07735218904'),
(45, 'Mr', 'Joe Gomez', 'jgomex@outlook.com', '$2y$10$HvFtFUGWg9DJWHcTjTuyv.PN3sl9w/JMhy2ZWPP8UUtwYoNTBnsIi', '28 green park', 'Belfast', '07734518902'),
(46, 'Mrs', 'Ciara Hegarty', 'ciarahegarty@gmail.com', '$2y$10$.ZcjJHPZn9wXWYa3rkGfieca.Ttxhj2tSYp90zLHGfPAYywWePbjC', '15 glen road', 'Belfast', '07734518925'),
(47, 'Mr', 'aaron', 'aaronmccullagh@hotmail.com', '$2y$10$j/Be5q61doVlA/FwLpOBmuMp/YVwAWxgCCLebGVFafWjIgGEp549C', '5 walkway road', 'United Kingdom', '07734518902'),
(49, 'Mr', 'Virgil Van Dijk', 'vvd@gmail.com', '$2y$10$De4kMT/mbxX/bgd0bdrKKeInz7.vj1OEFjc.7a5SOhiBtwt72aGXG', '4 Anfield Road', 'Liverpool', '07745123567'),
(53, 'Mr', 'Jimmy Joe', 'jimjoe@gmail.com', '$2y$10$uU3IqO0bueoOo1JM3MSIru2/qlp06O4Mf50wK7HcQbJ/dfKnyRL4y', '5 red road', 'belfast', '07725619023'),
(54, 'Mr', 'test', 'test@gmail.com', '$2y$10$qkjgId9laPD98XWwjaDY5OUwj7HAoU61f.KApUV5ERD4zisaxQzry', '1', '1', '1'),
(64, 'Mr', 'Aaron McCullagh', 'aaronmc@gmail.com', '$2y$10$3.d3CaQbzYVC42/KZP/ELuOQ82flSt4jnN7AB27m.EZoUL6speOAe', 'Cavendish', 'United Kingdom', '07719195609'),
(79, 'Mr', 'Aaron McCullagh', 'aaron@msn.com', '$2y$10$V647Ow.ET46/f4QEnNHb5.ANqllSwS8RIl/NqU1iwi/wLyeB8IhVy', '5 Cavendish Street', 'United Kingdom', '07719195609'),
(80, 'Mr', 'user1', 'user1@gmail.com', '$2y$10$lQwmp.qIlMcFB3n6EJbdNOIEAbZo9xoFV/FKF/cCCqLfRmkuoYY8G', '100 walkway gardens', 'Belfast', '0283541672'),
(81, 'Mr', 'test New User', 'newuser@google.com', '$2y$10$zEhXYYgS6HUwOsv63Ori1eCEL5GpNhkie8OXyme3o7FhDVchIL1Dm', '12 main street', 'Dublin', '07712345679'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `UserAccounts`
--
ALTER TABLE `UserAccounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `UserAccounts`
--
ALTER TABLE `UserAccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
