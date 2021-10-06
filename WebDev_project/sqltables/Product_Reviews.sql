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
-- Table structure for table `Product_Reviews`
--

CREATE TABLE `Product_Reviews` (
  `id` int(11) NOT NULL,
  `UserAccount` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Review` varchar(10000) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product_Reviews`
--

INSERT INTO `Product_Reviews` (`id`, `UserAccount`, `ProductID`, `Review`, `Rating`) VALUES
(24, 40, 1, 'great product, would recommend!', 5),
(25, 37, 2, 'good product, would recommend!', 4),
(26, 37, 3, 'good product, would recommend!', 4),
(28, 49, 645, 'great shirt!', 5),
(30, 64, 1019, 'brilliant - as described!', 5),
(31, 64, 131, 'good product, happy with purchase.', 4),
(32, 64, 81, 'would recommend!', 4),
(33, 64, 81, 'good product - would recommend!', 5),
(34, 64, 645, 'superb!', 5),
(35, 64, 74, 'great wee bike!', 4),
(40, 64, 21, 'good product', 5),
(41, 64, 29, 'would recommend', 5),
(44, 64, 383, 'Would recommend!', 4),
(47, 81, 147, 'good product!', 5),
(48, 64, 89, 'great product!', 4),
(49, 64, 90, 'great product!', 4),
(50, 64, 130, 'happy with purchase!', 4),
(51, 64, 612, 'brilliant football', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Product_Reviews`
--
ALTER TABLE `Product_Reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_review` (`ProductID`),
  ADD KEY `fk_user_account` (`UserAccount`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Product_Reviews`
--
ALTER TABLE `Product_Reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Product_Reviews`
--
ALTER TABLE `Product_Reviews`
  ADD CONSTRAINT `fk_product_review` FOREIGN KEY (`ProductID`) REFERENCES `SportZone` (`id`),
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`UserAccount`) REFERENCES `UserAccounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
