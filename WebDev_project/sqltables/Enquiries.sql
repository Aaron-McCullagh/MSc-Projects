-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2021 at 09:37 AM
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
-- Table structure for table `Enquiries`
--

CREATE TABLE `Enquiries` (
  `enqId` int(11) NOT NULL,
  `enquiry` varchar(10000) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Enquiries`
--

INSERT INTO `Enquiries` (`enqId`, `enquiry`, `name`, `email`) VALUES
(2, 'Hi, this is a test.\r\nThanks', 'Aaron', 'aaronmc@gmail.com'),
(8, 'test message', 'user', 'user@email.com'),
(9, 'test message', 'test', 'newuser@google.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Enquiries`
--
ALTER TABLE `Enquiries`
  ADD PRIMARY KEY (`enqId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Enquiries`
--
ALTER TABLE `Enquiries`
  MODIFY `enqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
