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
-- Table structure for table `Product_Categories`
--

CREATE TABLE `Product_Categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product_Categories`
--

INSERT INTO `Product_Categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Basketball'),
(2, 'Camping'),
(3, 'Bikes'),
(4, 'Exercise'),
(5, 'Tennis'),
(6, 'Water'),
(7, 'Soccer'),
(8, 'Gym'),
(9, 'Golf'),
(18, 'demo category');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Product_Categories`
--
ALTER TABLE `Product_Categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Product_Categories`
--
ALTER TABLE `Product_Categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
