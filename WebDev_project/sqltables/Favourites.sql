-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2021 at 09:38 AM
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
-- Table structure for table `Favourites`
--

CREATE TABLE `Favourites` (
  `favid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Favourites`
--

INSERT INTO `Favourites` (`favid`, `customerid`, `productid`) VALUES
(73, 64, 1),
(74, 64, 645),
(75, 64, 148),
(76, 64, 131),
(77, 64, 1089),
(80, 64, 10),
(84, 64, 13),
(85, 64, 230),
(86, 64, 29),
(89, 64, 951),
(92, 80, 645),
(93, 80, 32),
(94, 80, 131),
(95, 80, 951),
(130, 81, 147),
(131, 81, 1),
(136, 64, 612),
(137, 64, 101),
(138, 64, 130),
(139, 64, 522),
(140, 64, 555),
(141, 64, 979),
(142, 64, 61),
(143, 64, 771),
(144, 64, 69),
(145, 64, 205),
(146, 64, 226),
(147, 64, 89),
(148, 64, 139),
(149, 64, 4),
(150, 64, 677);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Favourites`
--
ALTER TABLE `Favourites`
  ADD PRIMARY KEY (`favid`),
  ADD KEY `fkcustid` (`customerid`),
  ADD KEY `fkproductid` (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Favourites`
--
ALTER TABLE `Favourites`
  MODIFY `favid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Favourites`
--
ALTER TABLE `Favourites`
  ADD CONSTRAINT `fkcustid` FOREIGN KEY (`customerid`) REFERENCES `UserAccounts` (`id`),
  ADD CONSTRAINT `fkproductid` FOREIGN KEY (`productid`) REFERENCES `SportZone` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
