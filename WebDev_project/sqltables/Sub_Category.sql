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
-- Table structure for table `Sub_Category`
--

CREATE TABLE `Sub_Category` (
  `subcatid` int(11) NOT NULL,
  `subcatname` varchar(250) NOT NULL,
  `maincatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sub_Category`
--

INSERT INTO `Sub_Category` (`subcatid`, `subcatname`, `maincatid`) VALUES
(1, 'Hoops-and-Nets', 1),
(2, 'Basketballs', 1),
(3, 'Other-Basketball-Equipment', 1),
(4, 'Chairs-and-Tables', 2),
(5, 'Cooking-Equipment', 2),
(6, 'Other-Camping-Equipment', 2),
(7, 'Regular-Bikes', 3),
(8, 'Electric-Bikes', 3),
(9, 'Combat-Sports', 4),
(10, 'Yoga', 4),
(11, 'Home-Exercise-Equipment', 4),
(12, 'Other-Exercise-Equipment', 4),
(13, 'Goals', 7),
(14, 'Footballs', 7),
(15, 'Apparel', 7),
(16, 'Exercise-Machines', 8),
(17, 'Weights', 8),
(18, 'Racquets', 5),
(19, 'Tables', 5),
(20, 'Tennis-Nets', 5),
(21, 'Other-Tennis-Equipment', 5),
(22, 'Wakeboards', 6),
(23, 'Wetsuits', 6),
(24, 'Other-Water-Sports-Equipment', 6),
(25, 'Push-Carts-and-Caddies', 9),
(26, 'Golf-Clubs', 9),
(27, 'Golf-Bags', 9),
(28, 'Golf-Shoes', 9),
(29, 'Other-Golf-Equipment', 9),
(30, 'Golf-Balls', 9),
(31, 'Golf-Gloves', 9),
(38, 'demo sub category', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Sub_Category`
--
ALTER TABLE `Sub_Category`
  ADD PRIMARY KEY (`subcatid`),
  ADD KEY `fkmaincat` (`maincatid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Sub_Category`
--
ALTER TABLE `Sub_Category`
  MODIFY `subcatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Sub_Category`
--
ALTER TABLE `Sub_Category`
  ADD CONSTRAINT `fkmaincat` FOREIGN KEY (`maincatid`) REFERENCES `Product_Categories` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
