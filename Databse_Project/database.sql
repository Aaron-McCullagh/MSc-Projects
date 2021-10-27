-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2021 at 11:11 AM
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
-- Table structure for table `AccountType`
--

CREATE TABLE `AccountType` (
  `AccountTypeID` int(11) NOT NULL,
  `AccType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AccountType`
--

INSERT INTO `AccountType` (`AccountTypeID`, `AccType`) VALUES
(1, 'easyJet Standard'),
(2, 'easyJet Plus');

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `AddressID` int(11) NOT NULL,
  `AddressLine1` varchar(255) NOT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `Town` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `County` varchar(255) DEFAULT NULL,
  `Postcode` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`AddressID`, `AddressLine1`, `AddressLine2`, `Town`, `City`, `County`, `Postcode`, `Country`) VALUES
(1, '55 Westway Park', '', '', 'Dublin', 'Dublin', 'D08 W4C6', 'Ireland'),
(2, '5 Camden Street', '', '', 'Belfast', 'Antrim', 'BT9 6BN', 'Northern Ireland'),
(3, '15 Grand Avenue', '', '', 'Munich', '', '10115', 'Germany'),
(4, '105  Glendore Way', '', '', 'Manchester', '', 'M24WU', 'United Kingdom'),
(8, '28 Melrose Drive', '', '', 'Liverpool', '', 'L15 78A', 'United Kingdom'),
(10, '22 Calle Pescadoro', 'Calle Pescadoro', '', 'Madrid', '', '28001', 'Spain'),
(11, 'Horly', 'Gatwick', '', '', 'West Sussex', 'RH6 0NP', 'England'),
(12, 'Stansted ', 'Mountfitchet', '', '', 'Essex', 'CM24 1QW', 'England'),
(13, 'Airport Road', 'Wesyway Lane', '', 'Belfast', 'Antrim', 'BT29 4AB', 'Northern Ireland'),
(14, '21010 Ferno', 'Mount pleasant', '', 'Milan', '', 'MXP', 'Italy'),
(15, 'Manchester ', '', '', 'Manchester', '', 'M90 1QX', 'England'),
(16, 'Schönefeld', '', '', 'Berlin', '', '12529', 'Germany'),
(17, ' L\'Altet', '', '', 'Alicante', '', '03195', 'Spain'),
(18, 'Evert van de Beekstraat 202', '', '', 'Amsterdam', '', '1118 CP', 'Netherlands'),
(19, 'Viale F. Ruffo di Calabria', '', '', ' Napoli', '', '80144', ' Italy'),
(20, 'Santa Cruz de Tenerife', '', '', '', '', '38610', 'Spain'),
(21, 'Faro', '', '', '', '', '8006-901', 'Portugal'),
(22, 'Mossley Hill ', '', '', 'Liverpool', '', 'L197 45A', 'United Kingdom'),
(23, 'Speke Hall Ave', 'Speke', '', 'Liverpool', '', 'L24 1YD', 'United Kingdom'),
(24, '54 WalkWay Grove', '', '', 'Glasgow', '', 'BT 56 89F', 'Scotland'),
(25, '15 Gortin Road', '', '', 'Dublin', 'Dublin', 'D12 789B', 'Ireland'),
(26, '29 Forrest Green', '', '', 'Belfast', 'Antrim', 'BT12 7BU', 'Norther Ireland'),
(27, '16 walkway road', '', '', 'Belfast', '', 'BT15 78B', 'Northern Ireland'),
(28, 'tester', '', 'tester', 'tester', '', 'tester', 'tester'),
(30, '5 Forest Green Park', '', '', 'Dublin', '', 'D12 754DB', 'Ireland'),
(31, '5 Forest Green Park', '', '', 'Dublin', '', 'D12 754DB', 'Ireland'),
(32, '5 TESTER k', '', '', 'Dublin', '', 'D12 754DB', 'Ireland');

-- --------------------------------------------------------

--
-- Table structure for table `Aircraft`
--

CREATE TABLE `Aircraft` (
  `AircraftID` int(11) NOT NULL,
  `AircraftReg` varchar(255) NOT NULL,
  `TypeOfAircraft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Aircraft`
--

INSERT INTO `Aircraft` (`AircraftID`, `AircraftReg`, `TypeOfAircraft`) VALUES
(1, 'G-EZAB', 1),
(2, 'G-EZAC', 1),
(3, 'G-EZAF', 1),
(4, 'G-EZAG', 2),
(5, 'G-EZGX', 2),
(6, 'G-EZGY', 2),
(7, 'G-EZOA', 3),
(8, 'G-EZOF', 3),
(9, 'G-UZHD', 3),
(10, 'G-UZHE', 4),
(11, 'G-UZMC', 4),
(12, 'G-UZHX', 5),
(13, 'G-UZMB', 5),
(14, 'G-UZMA', 6);

-- --------------------------------------------------------

--
-- Table structure for table `AircraftSeating`
--

CREATE TABLE `AircraftSeating` (
  `AircraftSeatID` int(11) NOT NULL,
  `AircraftID` int(11) NOT NULL,
  `SeatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AircraftSeating`
--

INSERT INTO `AircraftSeating` (`AircraftSeatID`, `AircraftID`, `SeatID`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 7),
(6, 2, 5),
(7, 2, 6),
(8, 2, 27),
(9, 2, 8),
(10, 2, 9),
(11, 2, 10),
(12, 2, 11),
(13, 2, 12),
(14, 2, 13),
(15, 2, 14),
(16, 2, 15),
(17, 2, 16),
(18, 2, 17),
(19, 2, 18),
(20, 2, 19),
(21, 2, 35),
(22, 2, 34),
(23, 3, 4),
(24, 3, 25),
(25, 3, 6),
(26, 3, 26),
(27, 3, 27),
(28, 3, 9),
(29, 3, 10),
(30, 3, 11),
(31, 3, 12),
(32, 3, 13),
(33, 3, 14),
(34, 3, 15),
(35, 3, 16),
(36, 3, 17),
(37, 3, 18),
(38, 3, 19),
(39, 3, 20),
(40, 3, 21),
(41, 1, 4),
(42, 1, 5),
(43, 1, 6),
(44, 1, 7),
(45, 1, 8),
(46, 1, 9),
(47, 1, 10),
(48, 1, 11),
(49, 1, 12),
(50, 1, 13),
(51, 1, 14),
(52, 1, 15),
(53, 1, 16),
(54, 1, 17),
(55, 1, 18),
(56, 1, 19),
(57, 1, 20),
(58, 1, 21),
(59, 4, 4),
(60, 4, 5),
(61, 4, 6),
(62, 4, 7),
(63, 4, 8),
(64, 4, 9),
(65, 4, 10),
(66, 4, 11),
(67, 4, 12),
(68, 4, 13),
(69, 4, 14),
(70, 4, 15),
(71, 4, 16),
(72, 4, 17),
(73, 4, 18),
(74, 4, 19),
(75, 4, 20),
(76, 4, 21),
(77, 5, 4),
(78, 5, 5),
(79, 5, 6),
(80, 5, 7),
(81, 5, 8),
(82, 5, 9),
(83, 5, 10),
(84, 5, 11),
(85, 5, 12),
(86, 5, 13),
(87, 5, 14),
(88, 5, 15),
(89, 5, 16),
(90, 5, 17),
(91, 5, 18),
(92, 5, 19),
(93, 5, 20),
(94, 5, 21),
(95, 2, 30),
(96, 2, 25),
(97, 2, 26),
(98, 2, 36);

-- --------------------------------------------------------

--
-- Table structure for table `AircraftType`
--

CREATE TABLE `AircraftType` (
  `AircraftTypeID` int(11) NOT NULL,
  `AircraftName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AircraftType`
--

INSERT INTO `AircraftType` (`AircraftTypeID`, `AircraftName`) VALUES
(1, 'Airbus A319-100'),
(2, 'Airbus A320-200'),
(3, 'Airbus A320neo'),
(4, 'Boeing 737-200'),
(5, 'Boeing 757-200'),
(6, 'Airbus A321neo');

-- --------------------------------------------------------

--
-- Table structure for table `Airport`
--

CREATE TABLE `Airport` (
  `AirportID` int(11) NOT NULL,
  `AirportName` varchar(255) NOT NULL,
  `AirportCode` varchar(255) NOT NULL,
  `AddressID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Airport`
--

INSERT INTO `Airport` (`AirportID`, `AirportName`, `AirportCode`, `AddressID`) VALUES
(1, 'London Gatwick Airport', 'LGW', 11),
(2, 'London Stansted Airport', 'STN', 12),
(5, 'Belfast International Airport', 'BFS', 13),
(8, 'Malpensa Airport', 'MXP', 14),
(10, 'Manchester Airport', 'MAN', 15),
(12, 'Berlin Schönefeld Airport', 'SXF', 16),
(13, 'Alicante Airport', 'ALC', 17),
(14, 'Amsterdam Schiphol Airport', 'AMS', 18),
(16, 'Naples International Airport', 'NAP', 19),
(18, 'Tenerife South Airport', 'TFS', 20),
(28, 'Faro Airport', 'FAO', 21),
(31, 'John Lennon Airport Liverpool', 'LPL', 23);

-- --------------------------------------------------------

--
-- Table structure for table `Baggage`
--

CREATE TABLE `Baggage` (
  `BaggageID` int(11) NOT NULL,
  `BaggTypeID` int(11) NOT NULL,
  `BaggagePrice` varchar(255) NOT NULL,
  `BaggCurrencyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Baggage`
--

INSERT INTO `Baggage` (`BaggageID`, `BaggTypeID`, `BaggagePrice`, `BaggCurrencyID`) VALUES
(1, 1, '20.00', 1),
(2, 2, '24.00', 1),
(3, 3, '35.00', 1),
(4, 4, '47.00', 1),
(5, 5, '60.00', 1),
(6, 1, '22.35', 2),
(7, 2, '26.80', 2),
(8, 3, '39.10', 2),
(9, 4, '52.50', 2),
(10, 5, '67.00', 2),
(11, 1, '26.50', 3),
(12, 2, '31.80', 3),
(13, 3, '46.38', 3),
(14, 4, '62.28', 3),
(15, 5, '79.50', 3),
(16, 1, '100', 4),
(17, 2, '120.50', 4),
(18, 3, '175.50', 4),
(19, 4, '236.00', 4),
(20, 5, '301.30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `BaggageTypes`
--

CREATE TABLE `BaggageTypes` (
  `BaggageTypeID` int(11) NOT NULL,
  `TypeOfBaggage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BaggageTypes`
--

INSERT INTO `BaggageTypes` (`BaggageTypeID`, `TypeOfBaggage`) VALUES
(1, '15kg hold bag'),
(2, '23kg hold bag'),
(3, '26kg hold bag'),
(4, '29kg hold bag'),
(5, '32kg hold bag');

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `BookingID` int(11) NOT NULL,
  `CustBookingID` int(11) NOT NULL,
  `BookingRef` varchar(255) NOT NULL,
  `BookingDate` date NOT NULL,
  `TotalPrice` decimal(12,2) NOT NULL,
  `BookCurrencyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`BookingID`, `CustBookingID`, `BookingRef`, `BookingDate`, `TotalPrice`, `BookCurrencyID`) VALUES
(1, 1, 'BKN1000', '2020-07-01', '169.50', 1),
(2, 2, 'BKN1001', '2020-07-06', '267.60', 2),
(3, 3, 'BKN1002', '2020-09-02', '793.70', 2),
(4, 4, 'BKN1003', '2020-09-30', '75.00', 1),
(5, 5, 'BKN1004', '2020-10-02', '108.45', 2),
(6, 1, 'BKN1455', '2021-01-31', '82.50', 1),
(7, 6, 'BKN4588', '2020-11-16', '850.00', 1),
(8, 7, 'BKN3256', '2020-11-25', '95.00', 3),
(9, 1, 'BKN4588', '2020-05-26', '100.00', 1),
(10, 8, 'BKN4557', '2020-11-27', '9.00', 2),
(11, 12, 'BKN4567', '2020-11-29', '200.00', 1),
(14, 14, 'BKN12345', '2020-11-30', '85.00', 1),
(15, 19, 'BKN3457', '2020-11-30', '580.00', 1),
(16, 20, 'BKN5678', '2020-11-01', '514.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `BookingLineItem`
--

CREATE TABLE `BookingLineItem` (
  `BookLineItemID` int(11) NOT NULL,
  `LineItemName` varchar(255) NOT NULL,
  `LineItemDesc` text NOT NULL,
  `LineItemCost` decimal(12,2) NOT NULL,
  `CurrencyID` int(11) NOT NULL,
  `BookerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BookingLineItem`
--

INSERT INTO `BookingLineItem` (`BookLineItemID`, `LineItemName`, `LineItemDesc`, `LineItemCost`, `CurrencyID`, `BookerID`) VALUES
(1, 'Flight Ticket', 'Adult ticket  Flight EZY1000                              ', '97.00', 1, 1),
(2, 'Food and Drink Voucher', '', '7.50', 1, 1),
(3, 'Seat ', 'Extra Legroom (A1)', '20.00', 1, 1),
(4, 'Flight ticket', 'Adult ticket\r\nFlight EZY1001\r\n ', '85.00', 2, 2),
(5, 'Baggage', '23kg carry on baggage \r\nFlight EZY1001      \r\n', '26.80', 2, 2),
(6, 'Flight Ticket', 'Adult ticket\r\nFlight EZY1050\r\n', '85.00', 2, 2),
(7, 'Baggage', '23kg hold baggage\r\n\r\n  ', '26.80', 2, 2),
(8, 'Seat', 'Extra Legroom (A1)\r\nFlight EZY1000', '22.00', 2, 2),
(9, 'Seat ', 'Extra Legroom (B2)\r\nFlight EZY1050', '22.00', 2, 2),
(10, 'Flight Tickets', '2 Adult tickets - Return                 \r\n1 Child ticket - Return\r\nOutgoing Flight EZY1025\r\nReturn Flight EZY1115', '390.00', 2, 3),
(11, 'Passenger Baggage', '32kg hold bag x 2 Return\r\nFlight EZY1050\r\nFlight EZY1115\r\n\r\n\r\n', '134.00', 2, 3),
(12, 'Food and Drink Voucher', '3 Food and drinks vouchers x2 Return\r\nFlight EZY1050\r\nFlight EZY1115                                           ', '50.00', 2, 3),
(14, 'Sports Equipment', 'Bicycle', '45.00', 1, 1),
(15, 'Sports Equipment', 'Golf bag x2 Return     \r\nBicylce x2 Return                                               ', '183.10', 2, 3),
(16, 'Flight Ticket', 'Adult Ticket - one way\r\nFlight EZY1200', '75.00', 1, 4),
(17, 'Flight Ticket', 'Adult Ticket - One way\r\nFlight EZY1850', '80.00', 2, 5),
(18, 'Baggage', '15kg hold bag', '22.35', 2, 5),
(19, 'Seat', 'Standard (A7)', '6.10', 2, 5),
(20, 'Seats', '3x Standard Seats\r\n2 way return', '36.60', 2, 3),
(21, 'Seat ', 'Seat D7 \r\nFlight EZY1245', '5.50', 1, 6),
(22, 'Plane Ticket', 'Adult - one way x4\r\nEZY1345', '308.00', 1, 7),
(27, 'Sports Equipment', 'Golf Bag x2\r\nBicycle x2\r\nWindsurfing Board x2\r\nHang Glider x1\r\nSnowboard x1\r\nCanoe x1\r\nOther small sports equip x1\r\n', '418.00', 1, 7),
(29, 'Flight Ticket', 'Adult Ticket - one way\r\nEZY1245', '75.00', 1, 6),
(30, 'Baggage', '15kg hold bag x2\r\n23 kg hold bag\r\n32kg hold bag', '124.00', 1, 7),
(32, 'Food and Drinks Voucher', 'x1', '9.00', 2, 10),
(33, 'Flight Tickets', '3 Adult tickets', '150.00', 1, 11),
(34, 'Seat Selection', '3 extra legroom seats\r\nA1, B1, C1 ', '50.00', 1, 11),
(35, 'Flight Ticket', '1 Adult ticket', '70.00', 1, 14),
(36, 'Seat Selection', 'Seat A1 \r\nFlight EXY3457\r\n', '15.00', 1, 14),
(41, 'Flight Ticket', '3 Adult Flight Tickets\r\nFlight EZY3456\r\n', '200.00', 1, 15),
(42, 'Seat Selections', 'A1-extra legroom\r\nB4 - upfront\r\nC8 - standard', '60.00', 1, 15),
(43, 'Sports Equipment', 'Bicycles @£45 x2\r\n1 Canoe @ £45\r\nSnowboard @£45 x2', '225.00', 1, 15),
(44, 'Baggage', '15 kg hold bag @£20 x3\r\n26kg hold bag @£35 x1', '95.00', 1, 15),
(45, 'Flight Tickets', 'Adult Tickets x3\r\nFlight EZY4567', '150.00', 1, 16),
(46, 'Seat Selection', 'A1 - Extra Legroom\r\nB1 - Extra Legroom\r\nA12 - Standard', '30.00', 1, 16),
(47, 'Baggage', '15kg hold bag x3\r\n29 kg hold bag x2', '154.00', 1, 16),
(48, 'Sports Equipment', 'Bicycle x2\r\nSnowboard x1\r\nHang glider x1\r\n', '180.00', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `Currency`
--

CREATE TABLE `Currency` (
  `CurrencyID` int(11) NOT NULL,
  `CurrencySign` varchar(255) NOT NULL,
  `CurrencyName` varchar(255) NOT NULL,
  `CurrencyType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Currency`
--

INSERT INTO `Currency` (`CurrencyID`, `CurrencySign`, `CurrencyName`, `CurrencyType`) VALUES
(1, '£', 'GBP', 'British Pounds'),
(2, '€', 'EUR', 'Euros'),
(3, '$', 'USD', 'US Dollars'),
(4, 'zl', 'PLN', 'Polish Zlotty'),
(5, 'kr', 'DKK', 'Danish Krone');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `TitleID` int(11) NOT NULL,
  `CustFirstName` varchar(255) NOT NULL,
  `CustSurname` varchar(255) NOT NULL,
  `CustDOB` date NOT NULL,
  `CustAddressID` int(11) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CustomerID`, `TitleID`, `CustFirstName`, `CustSurname`, `CustDOB`, `CustAddressID`, `ContactNumber`) VALUES
(1, 1, 'Emmette', 'Smyth', '1987-01-01', 2, '07728763802'),
(2, 2, 'Mary', 'O\'Neill', '1990-02-03', 3, '07748925678'),
(3, 1, 'Paul', 'Muller', '1975-02-15', 1, '+49 30 901820'),
(4, 3, 'Rachel', 'Roberts', '1990-02-04', 4, '07745876420'),
(5, 2, 'Sarah', 'Armstrong', '1988-08-15', 8, '07734578209'),
(6, 1, 'Andrew', 'Roberts', '1996-11-23', 10, '07719145603'),
(7, 1, 'Bradley', 'Phillips', '1990-11-23', 22, '07745689432'),
(8, 1, 'Brian', 'Connolly', '1987-08-14', 23, '07745217932'),
(10, 1, 'Bradley', 'McGlinchey', '2005-05-01', 30, '07723567321'),
(11, 1, 'John', 'Smyth', '1990-11-29', 30, '07717894563'),
(12, 1, 'Michael', 'Peters', '1992-08-14', 30, '0774568932'),
(14, 1, 'James', 'Johnston', '1990-01-05', 30, '07734589734'),
(19, 1, 'Sarah', 'Cleary', '1995-01-05', 30, '07719195609'),
(20, 1, 'Bruce', 'Wayne', '1990-12-02', 30, '07712345678');

-- --------------------------------------------------------

--
-- Table structure for table `Flight`
--

CREATE TABLE `Flight` (
  `FlightID` int(11) NOT NULL,
  `DepartureDate` date NOT NULL,
  `DepartureTime` time NOT NULL,
  `ArrivalDate` date NOT NULL,
  `ArrivalTime` time NOT NULL,
  `FlightCode` varchar(255) NOT NULL,
  `FlightAircraftID` int(11) NOT NULL,
  `FlightRouteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Flight`
--

INSERT INTO `Flight` (`FlightID`, `DepartureDate`, `DepartureTime`, `ArrivalDate`, `ArrivalTime`, `FlightCode`, `FlightAircraftID`, `FlightRouteID`) VALUES
(1, '2021-01-15', '17:30:00', '2021-01-15', '19:00:00', 'EZY1000', 1, 1),
(2, '2021-01-17', '10:00:00', '2021-01-17', '12:30:00', 'EZY1001', 2, 2),
(3, '2021-01-25', '09:00:00', '2021-01-28', '11:00:00', 'EZY1050', 3, 3),
(4, '2020-11-04', '10:00:00', '2020-11-04', '12:00:00', 'EZY1025', 9, 4),
(5, '2020-11-11', '12:20:00', '2020-11-11', '14:20:00', 'EZY1115', 7, 6),
(6, '2021-01-05', '16:00:00', '2021-01-05', '18:30:00', 'EZY1200', 3, 5),
(7, '2021-02-02', '17:00:00', '2021-02-02', '18:45:00', 'EZY1850', 12, 7),
(8, '2021-01-28', '10:00:00', '2020-01-28', '12:00:00', 'EZY1245', 1, 8),
(9, '2021-02-01', '17:30:00', '2021-02-02', '19:30:00', 'EZY5478', 5, 5),
(10, '2021-02-04', '10:00:00', '2021-02-04', '12:00:00', 'EZY1345', 2, 9),
(11, '2020-12-16', '16:00:00', '2020-12-14', '18:30:00', 'EZY4532', 4, 7),
(12, '2020-12-16', '17:00:00', '2020-12-16', '18:30:00', 'EZY4978', 2, 5),
(13, '2021-01-22', '17:00:00', '2021-01-22', '18:30:00', 'EZY5584', 10, 4),
(14, '2021-02-26', '17:00:00', '2021-02-26', '18:30:00', 'EZY8811', 12, 2),
(15, '2020-12-15', '16:00:00', '2020-12-15', '18:30:00', 'EZY7534', 2, 10),
(16, '2021-01-15', '08:00:00', '2021-01-15', '10:00:00', 'EZY5432', 1, 7),
(17, '2021-01-15', '10:00:00', '2021-01-15', '11:45:00', 'EZY6543', 2, 8),
(18, '2021-01-15', '12:15:00', '2021-01-15', '13:45:00', 'EZY6421', 3, 1),
(19, '2021-01-15', '13:35:00', '2021-01-15', '15:15:00', 'EZY8521', 4, 2),
(20, '2021-01-15', '16:15:00', '2021-01-15', '19:25:00', 'EZY2954', 5, 10),
(21, '2021-01-15', '14:25:00', '2021-01-15', '16:25:00', 'EZY7312', 6, 3),
(22, '2021-01-15', '18:15:00', '2021-01-15', '20:00:00', 'EZY1074', 10, 4),
(23, '2021-01-15', '15:15:00', '2021-01-15', '16:35:00', 'EZY1063', 12, 9),
(32, '2021-01-15', '19:00:00', '2021-01-15', '21:00:00', 'EZY1420', 11, 5),
(33, '2021-01-15', '16:45:00', '2021-01-15', '19:25:00', 'EZY9163', 11, 7),
(34, '2021-01-05', '10:00:00', '2021-01-05', '12:00:00', 'EZY3456', 14, 1),
(35, '2021-01-15', '10:00:00', '2021-01-15', '12:00:00', 'EZY2345', 2, 1),
(36, '2021-01-01', '10:00:00', '2021-01-01', '12:00:00', 'EZY4567', 2, 1),
(38, '2021-01-10', '10:00:00', '2021-01-10', '12:00:00', 'EZY4567', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `FlightPricing`
--

CREATE TABLE `FlightPricing` (
  `FlightPriceID` int(11) NOT NULL,
  `FlightID` int(11) NOT NULL,
  `FlightPrice` decimal(12,2) NOT NULL,
  `CurrencyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FlightPricing`
--

INSERT INTO `FlightPricing` (`FlightPriceID`, `FlightID`, `FlightPrice`, `CurrencyID`) VALUES
(1, 1, '90.00', 1),
(2, 1, '120.00', 2),
(3, 1, '155.00', 3),
(4, 1, '400.00', 4),
(5, 11, '460.99', 1),
(6, 11, '576.24', 2),
(7, 11, '768.32', 3),
(8, 11, '384.16', 4),
(9, 8, '125.00', 1),
(10, 8, '128.50', 2),
(11, 9, '80.00', 2),
(12, 6, '125.00', 1),
(13, 20, '97.00', 3),
(14, 19, '125.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `PassAssistance`
--

CREATE TABLE `PassAssistance` (
  `AssistanceID` int(11) NOT NULL,
  `AssistanceType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PassAssistance`
--

INSERT INTO `PassAssistance` (`AssistanceID`, `AssistanceType`) VALUES
(1, 'N/A'),
(2, 'wheelchair Assistance'),
(3, 'Travelling with guide dog'),
(4, 'hearing impaired'),
(5, 'intellectual assistance'),
(6, 'nut allergy');

-- --------------------------------------------------------

--
-- Table structure for table `PassBaggage`
--

CREATE TABLE `PassBaggage` (
  `PassBaggageID` int(11) NOT NULL,
  `Passenger` int(11) NOT NULL,
  `Baggage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PassBaggage`
--

INSERT INTO `PassBaggage` (`PassBaggageID`, `Passenger`, `Baggage`) VALUES
(1, 1, 1),
(4, 2, 2),
(5, 3, 2),
(6, 4, 10),
(7, 11, 6),
(8, 4, 6),
(10, 13, 1),
(12, 14, 1),
(13, 15, 2),
(14, 16, 5),
(19, 33, 4),
(21, 34, 1),
(22, 34, 1),
(37, 32, 1),
(38, 33, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Passenger`
--

CREATE TABLE `Passenger` (
  `PassengerID` int(11) NOT NULL,
  `PassengerTitleID` int(11) NOT NULL,
  `PassFirstName` varchar(255) NOT NULL,
  `PassSurname` varchar(255) NOT NULL,
  `PassBookingID` int(11) NOT NULL,
  `PassFlightID` int(11) NOT NULL,
  `PassAircraftSeat` int(11) NOT NULL,
  `PassType` int(11) NOT NULL,
  `PassPassportID` int(11) NOT NULL,
  `PassTravelReason` int(11) NOT NULL,
  `EasyJetPlus` tinyint(1) NOT NULL,
  `PassAssistType` int(11) NOT NULL,
  `Insurance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Passenger`
--

INSERT INTO `Passenger` (`PassengerID`, `PassengerTitleID`, `PassFirstName`, `PassSurname`, `PassBookingID`, `PassFlightID`, `PassAircraftSeat`, `PassType`, `PassPassportID`, `PassTravelReason`, `EasyJetPlus`, `PassAssistType`, `Insurance`) VALUES
(1, 1, 'John', 'Smyth', 1, 1, 4, 1, 1, 1, 0, 1, 0),
(2, 2, 'Mary', 'O\'Neill', 2, 2, 7, 1, 2, 2, 0, 1, 1),
(3, 2, 'Catherine', 'O\'Neill', 2, 3, 13, 1, 2, 2, 0, 1, 1),
(4, 1, 'Paul', 'Muller', 3, 4, 23, 1, 3, 2, 0, 1, 1),
(5, 2, 'Ciara', 'Muller', 3, 4, 25, 1, 4, 2, 1, 6, 1),
(6, 1, 'Patrick', 'Roberts', 3, 4, 25, 2, 4, 2, 0, 6, 0),
(7, 1, 'Robert', 'Peteres', 14, 5, 43, 1, 3, 2, 0, 1, 1),
(8, 2, 'Ciara', 'Johnson', 3, 5, 44, 1, 4, 2, 0, 1, 1),
(9, 1, 'Louise', 'O\' Neill', 3, 5, 45, 2, 5, 2, 0, 1, 0),
(10, 3, 'Rachel', 'McElroy', 4, 6, 48, 1, 6, 1, 0, 1, 0),
(11, 3, 'Sarah', 'Armstrong', 5, 7, 6, 1, 7, 2, 0, 1, 0),
(12, 1, 'John ', 'Smyth', 6, 8, 17, 1, 8, 1, 0, 1, 1),
(13, 1, 'Andrew ', 'Roberts', 7, 10, 16, 1, 9, 2, 1, 1, 0),
(14, 1, 'John', 'Stevens', 7, 10, 22, 1, 10, 2, 1, 1, 0),
(15, 1, 'Sheamus', 'O\'Reilly', 7, 10, 95, 1, 11, 2, 0, 1, 0),
(16, 2, 'Louise', 'Roberts', 7, 10, 20, 1, 12, 2, 1, 1, 0),
(17, 2, 'Louise', 'Sweeney', 7, 10, 97, 1, 14, 2, 0, 1, 0),
(18, 2, 'Ciara', 'Foster', 7, 10, 5, 1, 15, 2, 1, 1, 0),
(19, 1, 'Tom', 'Spencer', 7, 10, 15, 1, 16, 2, 0, 1, 0),
(20, 3, 'Sarah', 'Cathcart', 7, 10, 8, 1, 17, 2, 0, 1, 0),
(21, 1, 'Tom', 'Forde', 7, 10, 21, 1, 20, 1, 1, 1, 1),
(22, 1, 'John', 'White', 7, 10, 4, 1, 26, 1, 1, 6, 1),
(23, 1, 'Paul', 'Johnson', 4, 6, 27, 1, 24, 2, 0, 1, 0),
(24, 3, 'Sharon ', 'Molloy', 4, 6, 37, 1, 28, 2, 0, 1, 0),
(26, 1, 'Brian', 'Connolly', 10, 15, 15, 1, 32, 2, 0, 1, 0),
(27, 1, 'Bruce ', 'Wayne', 15, 35, 3, 1, 4, 1, 0, 1, 0),
(28, 2, 'Sarah', 'White', 15, 35, 3, 1, 5, 1, 1, 1, 0),
(29, 1, 'Joe', 'Roberts', 15, 35, 7, 1, 10, 2, 0, 1, 0),
(32, 1, 'John', 'Jones', 16, 36, 20, 1, 11, 2, 0, 1, 0),
(33, 1, 'Bruce ', 'Wayne', 16, 36, 1, 1, 11, 1, 0, 1, 0),
(34, 2, 'Ciara', 'Wayne', 16, 36, 2, 1, 5, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `PassengerTypes`
--

CREATE TABLE `PassengerTypes` (
  `PassengerTypeID` int(11) NOT NULL,
  `PassengerType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PassengerTypes`
--

INSERT INTO `PassengerTypes` (`PassengerTypeID`, `PassengerType`) VALUES
(1, 'Adult '),
(2, 'Child '),
(3, 'Infant');

-- --------------------------------------------------------

--
-- Table structure for table `Passports`
--

CREATE TABLE `Passports` (
  `PassportID` int(11) NOT NULL,
  `PassportNumber` varbinary(255) NOT NULL,
  `Country` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Passports`
--

INSERT INTO `Passports` (`PassportID`, `PassportNumber`, `Country`) VALUES
(1, 0x56b7e8f29421082f1e554654a0b964aac5a30c66d10ef69739263ce5c60e332a, 0xd7f3f665362909ce95ab02e789385177),
(2, 0x037ab5d894bd386651a5aac91654bd19004c87427f62ff4b53ed383f164dcdfb, 0xc36b0a892299ed797cc9b96c869c1e40),
(3, 0x81dccdcf5aed93eb3683abfb66794f105a4923b2578b8087b0a7afeac49fb752, 0x59fbfbecbfd0ac306d6d717c29fc7e72),
(4, 0x833c53adcbe3d4a7bc886a5352ca6ffff7bc7fc690b9523e6e8480cdad5eb236, 0xa1c214b9d89d1b85704feac0a556b3c1),
(5, 0xd1e9199a015b9cb33cda6d6af692cf830d08d44804e68522914ea4b94bd63643, 0xcb2a7a6b2b58123d751a8bcef3a5f35c),
(6, 0xe82e8f76c9e3295d6c81db002dbb56b0e49fe233b4a4d89ef4ed75dfd12996c3, 0xd404afe575b3da5c61d2a814df4f6839),
(7, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(8, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(9, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(10, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(11, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(12, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(13, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(14, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(15, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(16, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(17, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(18, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(19, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(20, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(21, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(22, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(23, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(24, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(25, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(26, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(27, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(28, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(29, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(30, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(31, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895),
(32, 0xea203a196d25ed6eab50405740a21a12608f72330a5cddb6aaedae5df0cf1355, 0x3bab7b3a80d5ae11bc4784b35155a895);

-- --------------------------------------------------------

--
-- Table structure for table `PassSportsEquipment`
--

CREATE TABLE `PassSportsEquipment` (
  `PassSportsEquipmentID` int(11) NOT NULL,
  `Passenger` int(11) NOT NULL,
  `Equipment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PassSportsEquipment`
--

INSERT INTO `PassSportsEquipment` (`PassSportsEquipmentID`, `Passenger`, `Equipment`) VALUES
(1, 1, 1),
(2, 4, 12),
(3, 4, 9),
(4, 2, 1),
(5, 2, 5),
(7, 13, 4),
(8, 13, 4),
(10, 14, 5),
(11, 14, 1),
(12, 15, 7),
(13, 15, 2),
(14, 16, 6),
(15, 16, 8),
(16, 33, 1),
(17, 33, 1),
(18, 32, 7),
(19, 34, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `PaymentID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `CardProvider` varbinary(255) NOT NULL,
  `NameOnCard` varbinary(512) NOT NULL,
  `CardNumber` varbinary(512) NOT NULL,
  `CardCVV` varbinary(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`PaymentID`, `AccountID`, `CardProvider`, `NameOnCard`, `CardNumber`, `CardCVV`) VALUES
(1, 1, 0x080800e69010cc1ee554e74f0ff94346, 0x3fd688da910b40f74672413220d117d3, 0x873278dfc90ac5ede60b6343744f401b7d54d40f55ebca842489b55fc3af7dd9, 0xf35a62fabcfd9186eb5e61db03594ad8),
(2, 2, 0x080800e69010cc1ee554e74f0ff94346, 0x7ca0b4ce0a0e51af2ae58ecdae54b03c, 0x544a68f9c3748f00602df5a62ade6cd9a0abb2e2a0012d1a91bbd323d24cdfd3, 0xf54ba8d99d9d5e9486a4ec698feea304),
(3, 3, 0x080800e69010cc1ee554e74f0ff94346, 0xeabb2145e345fe9cbad93d60624acaf1, 0x11e52d3f4fdbf80c317bd232c9d7dca40d7f41503dea0b36a67dc62dc5ef9bc3, 0x6880dc620994c4bde15779c3e9163d44),
(4, 3, 0x080800e69010cc1ee554e74f0ff94346, 0x272830b17d8ac089d9f75ed2dea337f9, 0x0a9f96a39c53b079e2bc6fe6eae489a35af6aaea8d2cfe60c613022a016aa9f7, 0x9c68beb4119afa92bfd3d1e988ef7020),
(5, 12, 0x080800e69010cc1ee554e74f0ff94346, 0xb2bc48460da7f183eb3f248c2ed824ad, 0x58d38c665a37efcd727889953ad03fc2a6ad0038036e8c9132dbe4ebd07f23e9, 0x9c68beb4119afa92bfd3d1e988ef7020),
(6, 17, 0x080800e69010cc1ee554e74f0ff94346, 0xf9dbc545020637e0ab74fd0e32a89ef8, 0xb57115501dea5540d45ce96fa5bd66c75235be3aec7e9bfed5754c5439c624f6, 0x7bfa238b0328caa71d5fd2806d5e890a),
(7, 4, 0x080800e69010cc1ee554e74f0ff94346, 0xf06c21b1df4681558bbbb99935437faf, 0x6ee94caf399574ee6eef5b1bb8de7883d4a46dcdc337e8e762f6e4ff0f7c14a5, 0x5993afff3f6322fa5ab1291419bac9a7),
(8, 21, 0x549ac7590b412f52113bb5a5b85c7764, 0x3338e27d996e79bb301f81b920e3ed31, 0x6ee94caf399574ee6eef5b1bb8de7883d4a46dcdc337e8e762f6e4ff0f7c14a5, 0x5993afff3f6322fa5ab1291419bac9a7),
(11, 27, 0xc772b21a3c469878d425bfec5ccbf37d, 0x962c19b740a2cc3e3ef1f791fe603759, 0xc9bcd2b4b1231ad30252f8e5c01e2a7a032d6b81bc556129386da78d1d283441, 0xe02e7d7e6316a863c10734b29e286d58);

-- --------------------------------------------------------

--
-- Table structure for table `ReasonForTravel`
--

CREATE TABLE `ReasonForTravel` (
  `TravelReasonID` int(11) NOT NULL,
  `TravelReason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ReasonForTravel`
--

INSERT INTO `ReasonForTravel` (`TravelReasonID`, `TravelReason`) VALUES
(1, 'Business'),
(2, 'Leisure');

-- --------------------------------------------------------

--
-- Table structure for table `Route`
--

CREATE TABLE `Route` (
  `RouteID` int(11) NOT NULL,
  `RouteName` varchar(255) NOT NULL,
  `DepartAirport` int(11) NOT NULL,
  `ArrivalAirport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Route`
--

INSERT INTO `Route` (`RouteID`, `RouteName`, `DepartAirport`, `ArrivalAirport`) VALUES
(1, 'Belfast to Amsterdam', 5, 14),
(2, 'Belfast to Berlin', 5, 12),
(3, 'Berlin to Belfast', 12, 5),
(4, 'Berlin to London Gatwick', 12, 1),
(5, 'Manchester to Faro', 10, 28),
(6, 'London to Berlin', 2, 12),
(7, 'Alicante to Naples', 13, 16),
(8, 'Amsterdam to Belfast', 14, 5),
(9, 'Liverpool to Naples', 31, 16),
(10, 'Belfast to London Gatwick', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Seating`
--

CREATE TABLE `Seating` (
  `SeatID` int(11) NOT NULL,
  `SeatSelection` varchar(11) NOT NULL,
  `SeatTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Seating`
--

INSERT INTO `Seating` (`SeatID`, `SeatSelection`, `SeatTypeID`) VALUES
(1, 'A1', 1),
(2, 'B1', 1),
(3, 'C1', 1),
(4, 'D1', 1),
(5, 'E1', 1),
(6, 'F1', 1),
(7, 'A2', 2),
(8, 'B2', 2),
(9, 'C2', 2),
(10, 'D2', 2),
(11, 'E2', 2),
(12, 'F2', 2),
(13, 'A3', 2),
(14, 'B3', 2),
(15, 'C3', 2),
(16, 'D3', 2),
(17, 'E3', 2),
(18, 'F3', 2),
(19, 'A12', 1),
(20, 'B12', 1),
(21, 'C12', 1),
(22, 'D12', 1),
(23, 'E12', 1),
(24, 'F12', 1),
(25, 'A16', 3),
(26, 'B16', 3),
(27, 'C16', 3),
(28, 'D16', 3),
(29, 'E16', 3),
(30, 'F16', 3),
(31, 'A18', 3),
(32, 'B18', 3),
(33, 'C18', 3),
(34, 'D18', 3),
(35, 'E18', 3),
(36, 'F18', 3);

-- --------------------------------------------------------

--
-- Table structure for table `SeatPrice`
--

CREATE TABLE `SeatPrice` (
  `SeatPriceID` int(11) NOT NULL,
  `SeatTypeID` int(11) NOT NULL,
  `CurrencyID` int(11) NOT NULL,
  `Price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SeatPrice`
--

INSERT INTO `SeatPrice` (`SeatPriceID`, `SeatTypeID`, `CurrencyID`, `Price`) VALUES
(1, 1, 1, '20.00'),
(2, 1, 2, '22.00'),
(3, 1, 3, '26.50'),
(4, 1, 4, '100.00'),
(5, 2, 1, '18.50'),
(6, 2, 2, '20.00'),
(7, 2, 3, '26.50'),
(8, 2, 4, '92.50'),
(9, 3, 1, '5.50'),
(10, 3, 2, '6.10'),
(11, 3, 3, '7.30'),
(12, 3, 4, '27.50');

-- --------------------------------------------------------

--
-- Table structure for table `SeatType`
--

CREATE TABLE `SeatType` (
  `SeatTypeID` int(11) NOT NULL,
  `SeatTypeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SeatType`
--

INSERT INTO `SeatType` (`SeatTypeID`, `SeatTypeName`) VALUES
(1, 'Extra Legroom'),
(2, 'Up Front'),
(3, 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `SportsEquipment`
--

CREATE TABLE `SportsEquipment` (
  `SportsEquipmentID` int(11) NOT NULL,
  `EquipTypeID` int(11) NOT NULL,
  `SportsEquipPrice` decimal(12,2) NOT NULL,
  `CurrencyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SportsEquipment`
--

INSERT INTO `SportsEquipment` (`SportsEquipmentID`, `EquipTypeID`, `SportsEquipPrice`, `CurrencyID`) VALUES
(1, 1, '45.00', 1),
(2, 2, '45.00', 1),
(3, 3, '37.00', 1),
(4, 4, '37.00', 1),
(5, 5, '45.00', 1),
(6, 6, '37.00', 1),
(7, 7, '37.00', 1),
(8, 8, '45.00', 1),
(9, 1, '50.25', 2),
(10, 2, '50.25', 2),
(11, 3, '41.30', 2),
(12, 4, '41.30', 2),
(13, 5, '50.25', 2),
(14, 6, '41.30', 2),
(15, 7, '41.30', 2),
(16, 8, '50.25', 2),
(17, 1, '59.65', 3),
(18, 2, '59.65', 3),
(19, 3, '49.00', 3),
(20, 4, '49.00', 3),
(21, 5, '59.65', 3),
(22, 6, '49.00', 3),
(23, 7, '49.00', 3),
(24, 8, '59.65', 3),
(25, 1, '225.65', 4),
(26, 2, '225.65', 4),
(27, 3, '185.55', 4),
(28, 4, '185.55', 4),
(29, 5, '225.65', 4),
(30, 6, '185.55', 4),
(31, 7, '185.55', 4),
(32, 8, '225.65', 4);

-- --------------------------------------------------------

--
-- Table structure for table `SportsEquipTypes`
--

CREATE TABLE `SportsEquipTypes` (
  `SporstTypeID` int(11) NOT NULL,
  `TypeOfEquip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SportsEquipTypes`
--

INSERT INTO `SportsEquipTypes` (`SporstTypeID`, `TypeOfEquip`) VALUES
(1, 'Bicycle'),
(2, 'Canoe'),
(3, 'Sporting firearm'),
(4, 'Golf bag'),
(5, 'Hang glider'),
(6, 'Other small sports equipment'),
(7, 'Snowboard'),
(8, 'Windsurfing board'),
(9, 'Skis and/or boots');

-- --------------------------------------------------------

--
-- Table structure for table `Title`
--

CREATE TABLE `Title` (
  `TitleID` int(11) NOT NULL,
  `TitleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Title`
--

INSERT INTO `Title` (`TitleID`, `TitleName`) VALUES
(1, 'Mr'),
(2, 'Mrs'),
(3, 'Miss'),
(4, 'Ms');

-- --------------------------------------------------------

--
-- Table structure for table `UserAccount`
--

CREATE TABLE `UserAccount` (
  `AccountID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `UserPassword` varbinary(255) NOT NULL,
  `CustID` int(11) NOT NULL,
  `AccountType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserAccount`
--

INSERT INTO `UserAccount` (`AccountID`, `Email`, `Username`, `UserPassword`, `CustID`, `AccountType`) VALUES
(1, 'pmuller@msn.com', 'pmuller11', 0x46d3c9ea539eabff2ae17b35a28b5577, 3, 1),
(2, 'paulmull@outlook.com', 'petermull123', 0x5b4ee60c66ec49f5068694761dbe18b6, 3, 1),
(3, 'maryoneill@msn.com', 'maryoneill11', 0x0f73f9d6557cb66a9c515ea4a7b37046, 2, 2),
(4, 'pmuller2@gmail.com', 'pmuller4', 0x0c8c8a854c73746b94ae902fd2514b8f, 3, 2),
(5, 'rachelmc@gmail.com', 'rachelmc3', 0x77ca82259d8ca6874fe14295e6b608c3, 4, 1),
(6, 'sarah123@hotmail.com', 'sarah1234', 0x8fe398b9e6ff056fe2e88f74e1feaf1f, 5, 2),
(7, 'aroberts@msn.com', 'andyrob1', 0x58345a31fa8688778eaf30f91000b427, 6, 2),
(8, 'andrewrob@msn.com', 'andrewrob1', 0xed50929651408ecdb22acc52930914bd, 6, 1),
(9, 'JohnSmyth28@msn.com', 'johnsmith44', 0x894eb8d2e820f76f9bcd723e69ffc9ae, 1, 2),
(10, 'bphilips123@yahoo.com', 'bradleyp45', 0x3795c0b56e5fa824f617abccf40f13db, 7, 1),
(11, 'brianconnolly@yahoo.com', 'briancon45', 0xa566828e3bb7f5d6350b83a7be64628b, 8, 1),
(12, 'peterson1h@google.coM', 'jsmyth11', 0x9057ccdc1314e5df0beef836418b2633, 10, 1),
(17, 'jsmyth@outlook,com', 'jsmyth8', 0xc75769f187a714e6528319719ec97673, 12, 1),
(21, 'jimmyhow@masn.com', 'jimmyjoe', 0x5064b1c81e38b1f93612b45e25fcd55a, 14, 1),
(27, 'bwayne11@msn.com', 'bwayne12345', 0x5064b1c81e38b1f93612b45e25fcd55a, 20, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AccountType`
--
ALTER TABLE `AccountType`
  ADD PRIMARY KEY (`AccountTypeID`);

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`AddressID`);

--
-- Indexes for table `Aircraft`
--
ALTER TABLE `Aircraft`
  ADD PRIMARY KEY (`AircraftID`),
  ADD KEY `FK_AircraftType` (`TypeOfAircraft`),
  ADD KEY `AircraftReg` (`AircraftReg`);

--
-- Indexes for table `AircraftSeating`
--
ALTER TABLE `AircraftSeating`
  ADD PRIMARY KEY (`AircraftSeatID`),
  ADD KEY `FK_AircraftID` (`AircraftID`),
  ADD KEY `SeatID` (`SeatID`);

--
-- Indexes for table `AircraftType`
--
ALTER TABLE `AircraftType`
  ADD PRIMARY KEY (`AircraftTypeID`);

--
-- Indexes for table `Airport`
--
ALTER TABLE `Airport`
  ADD PRIMARY KEY (`AirportID`),
  ADD KEY `FK_AirportAddressID` (`AddressID`);

--
-- Indexes for table `Baggage`
--
ALTER TABLE `Baggage`
  ADD PRIMARY KEY (`BaggageID`),
  ADD KEY `FK_BaggageCurrencyID` (`BaggCurrencyID`),
  ADD KEY `FK_BaggageTypeID` (`BaggTypeID`);

--
-- Indexes for table `BaggageTypes`
--
ALTER TABLE `BaggageTypes`
  ADD PRIMARY KEY (`BaggageTypeID`);

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `FK_BookingCurrencyID` (`BookCurrencyID`),
  ADD KEY `FK_CustomerBookingID` (`CustBookingID`);

--
-- Indexes for table `BookingLineItem`
--
ALTER TABLE `BookingLineItem`
  ADD PRIMARY KEY (`BookLineItemID`),
  ADD KEY `FK_LineItemBookingID` (`BookerID`),
  ADD KEY `FK_CurrencyID` (`CurrencyID`);

--
-- Indexes for table `Currency`
--
ALTER TABLE `Currency`
  ADD PRIMARY KEY (`CurrencyID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `FK_UserTitleID` (`TitleID`),
  ADD KEY `FK_UserAddress` (`CustAddressID`);

--
-- Indexes for table `Flight`
--
ALTER TABLE `Flight`
  ADD PRIMARY KEY (`FlightID`),
  ADD KEY `FK_RouteID` (`FlightRouteID`),
  ADD KEY `FK_FlightAircraftID` (`FlightAircraftID`);

--
-- Indexes for table `FlightPricing`
--
ALTER TABLE `FlightPricing`
  ADD PRIMARY KEY (`FlightPriceID`),
  ADD KEY `FK_FlightPriceID` (`FlightID`),
  ADD KEY `FK_CuurencyFlightPriceID` (`CurrencyID`);

--
-- Indexes for table `PassAssistance`
--
ALTER TABLE `PassAssistance`
  ADD PRIMARY KEY (`AssistanceID`);

--
-- Indexes for table `PassBaggage`
--
ALTER TABLE `PassBaggage`
  ADD PRIMARY KEY (`PassBaggageID`),
  ADD KEY `FK_PassBaggageID` (`Baggage`),
  ADD KEY `FK_BaggagePassID` (`Passenger`);

--
-- Indexes for table `Passenger`
--
ALTER TABLE `Passenger`
  ADD PRIMARY KEY (`PassengerID`),
  ADD KEY `FK_PassTitle` (`PassengerTitleID`),
  ADD KEY `FK_PassengerType` (`PassType`),
  ADD KEY `FK_PassBookingID` (`PassBookingID`),
  ADD KEY `FK_FlightID` (`PassFlightID`),
  ADD KEY `FK_TravelReason` (`PassTravelReason`),
  ADD KEY `FK_AssistanceID` (`PassAssistType`),
  ADD KEY `FK_AirCraftSeat` (`PassAircraftSeat`),
  ADD KEY `FK_PassportID` (`PassPassportID`);

--
-- Indexes for table `PassengerTypes`
--
ALTER TABLE `PassengerTypes`
  ADD PRIMARY KEY (`PassengerTypeID`);

--
-- Indexes for table `Passports`
--
ALTER TABLE `Passports`
  ADD PRIMARY KEY (`PassportID`);

--
-- Indexes for table `PassSportsEquipment`
--
ALTER TABLE `PassSportsEquipment`
  ADD PRIMARY KEY (`PassSportsEquipmentID`),
  ADD KEY `FK_SportsEquipPassengerID` (`Passenger`),
  ADD KEY `FK_PassengerSportsEquipID` (`Equipment`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `FK_AccountID` (`AccountID`);

--
-- Indexes for table `ReasonForTravel`
--
ALTER TABLE `ReasonForTravel`
  ADD PRIMARY KEY (`TravelReasonID`);

--
-- Indexes for table `Route`
--
ALTER TABLE `Route`
  ADD PRIMARY KEY (`RouteID`),
  ADD KEY `FK_DepartureAirportID` (`DepartAirport`),
  ADD KEY `Fk_ArrivalAirportID` (`ArrivalAirport`);

--
-- Indexes for table `Seating`
--
ALTER TABLE `Seating`
  ADD PRIMARY KEY (`SeatID`),
  ADD KEY `FK_SeatTypeID` (`SeatTypeID`);

--
-- Indexes for table `SeatPrice`
--
ALTER TABLE `SeatPrice`
  ADD PRIMARY KEY (`SeatPriceID`),
  ADD KEY `FK_SeatTypePriceID` (`SeatTypeID`),
  ADD KEY `FK_SeatPriceCurrency` (`CurrencyID`);

--
-- Indexes for table `SeatType`
--
ALTER TABLE `SeatType`
  ADD PRIMARY KEY (`SeatTypeID`);

--
-- Indexes for table `SportsEquipment`
--
ALTER TABLE `SportsEquipment`
  ADD PRIMARY KEY (`SportsEquipmentID`),
  ADD KEY `FK_SportsEqipCurrencyID` (`CurrencyID`),
  ADD KEY `FK_EquipTypeID` (`EquipTypeID`);

--
-- Indexes for table `SportsEquipTypes`
--
ALTER TABLE `SportsEquipTypes`
  ADD PRIMARY KEY (`SporstTypeID`);

--
-- Indexes for table `Title`
--
ALTER TABLE `Title`
  ADD PRIMARY KEY (`TitleID`);

--
-- Indexes for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `FK_CustomerAccID` (`CustID`),
  ADD KEY `FK_AccountTyperID1` (`AccountType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AccountType`
--
ALTER TABLE `AccountType`
  MODIFY `AccountTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Aircraft`
--
ALTER TABLE `Aircraft`
  MODIFY `AircraftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `AircraftSeating`
--
ALTER TABLE `AircraftSeating`
  MODIFY `AircraftSeatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `AircraftType`
--
ALTER TABLE `AircraftType`
  MODIFY `AircraftTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Airport`
--
ALTER TABLE `Airport`
  MODIFY `AirportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Baggage`
--
ALTER TABLE `Baggage`
  MODIFY `BaggageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `BaggageTypes`
--
ALTER TABLE `BaggageTypes`
  MODIFY `BaggageTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `BookingLineItem`
--
ALTER TABLE `BookingLineItem`
  MODIFY `BookLineItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `Currency`
--
ALTER TABLE `Currency`
  MODIFY `CurrencyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Flight`
--
ALTER TABLE `Flight`
  MODIFY `FlightID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `FlightPricing`
--
ALTER TABLE `FlightPricing`
  MODIFY `FlightPriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `PassAssistance`
--
ALTER TABLE `PassAssistance`
  MODIFY `AssistanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `PassBaggage`
--
ALTER TABLE `PassBaggage`
  MODIFY `PassBaggageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `Passenger`
--
ALTER TABLE `Passenger`
  MODIFY `PassengerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `PassengerTypes`
--
ALTER TABLE `PassengerTypes`
  MODIFY `PassengerTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Passports`
--
ALTER TABLE `Passports`
  MODIFY `PassportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `PassSportsEquipment`
--
ALTER TABLE `PassSportsEquipment`
  MODIFY `PassSportsEquipmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ReasonForTravel`
--
ALTER TABLE `ReasonForTravel`
  MODIFY `TravelReasonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Route`
--
ALTER TABLE `Route`
  MODIFY `RouteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Seating`
--
ALTER TABLE `Seating`
  MODIFY `SeatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `SeatPrice`
--
ALTER TABLE `SeatPrice`
  MODIFY `SeatPriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `SeatType`
--
ALTER TABLE `SeatType`
  MODIFY `SeatTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `SportsEquipment`
--
ALTER TABLE `SportsEquipment`
  MODIFY `SportsEquipmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `SportsEquipTypes`
--
ALTER TABLE `SportsEquipTypes`
  MODIFY `SporstTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Title`
--
ALTER TABLE `Title`
  MODIFY `TitleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `UserAccount`
--
ALTER TABLE `UserAccount`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Aircraft`
--
ALTER TABLE `Aircraft`
  ADD CONSTRAINT `FK_AircraftType` FOREIGN KEY (`TypeOfAircraft`) REFERENCES `AircraftType` (`AircraftTypeID`);

--
-- Constraints for table `AircraftSeating`
--
ALTER TABLE `AircraftSeating`
  ADD CONSTRAINT `FK_AircraftID` FOREIGN KEY (`AircraftID`) REFERENCES `Aircraft` (`AircraftID`),
  ADD CONSTRAINT `SeatID` FOREIGN KEY (`SeatID`) REFERENCES `Seating` (`SeatID`);

--
-- Constraints for table `Airport`
--
ALTER TABLE `Airport`
  ADD CONSTRAINT `FK_AirportAddressID` FOREIGN KEY (`AddressID`) REFERENCES `Address` (`AddressID`);

--
-- Constraints for table `Baggage`
--
ALTER TABLE `Baggage`
  ADD CONSTRAINT `FK_BaggageCurrencyID` FOREIGN KEY (`BaggCurrencyID`) REFERENCES `Currency` (`CurrencyID`),
  ADD CONSTRAINT `FK_BaggageTypeID` FOREIGN KEY (`BaggTypeID`) REFERENCES `BaggageTypes` (`BaggageTypeID`);

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `FK_BookingCurrencyID` FOREIGN KEY (`BookCurrencyID`) REFERENCES `Currency` (`CurrencyID`),
  ADD CONSTRAINT `FK_CustomerBookingID` FOREIGN KEY (`CustBookingID`) REFERENCES `Customer` (`CustomerID`);

--
-- Constraints for table `BookingLineItem`
--
ALTER TABLE `BookingLineItem`
  ADD CONSTRAINT `FK_CurrencyID` FOREIGN KEY (`CurrencyID`) REFERENCES `Currency` (`CurrencyID`),
  ADD CONSTRAINT `FK_LineItemBookingID` FOREIGN KEY (`BookerID`) REFERENCES `Booking` (`BookingID`);

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `FK_CustAddress` FOREIGN KEY (`CustAddressID`) REFERENCES `Address` (`AddressID`),
  ADD CONSTRAINT `FK_TitleID1` FOREIGN KEY (`TitleID`) REFERENCES `Title` (`TitleID`);

--
-- Constraints for table `Flight`
--
ALTER TABLE `Flight`
  ADD CONSTRAINT `FK_FlightAircraftID` FOREIGN KEY (`FlightAircraftID`) REFERENCES `Aircraft` (`AircraftID`),
  ADD CONSTRAINT `FK_RouteID` FOREIGN KEY (`FlightRouteID`) REFERENCES `Route` (`RouteID`);

--
-- Constraints for table `FlightPricing`
--
ALTER TABLE `FlightPricing`
  ADD CONSTRAINT `FK_CuurencyFlightPriceID` FOREIGN KEY (`CurrencyID`) REFERENCES `Currency` (`CurrencyID`),
  ADD CONSTRAINT `FK_FlightPriceID` FOREIGN KEY (`FlightID`) REFERENCES `Flight` (`FlightID`);

--
-- Constraints for table `PassBaggage`
--
ALTER TABLE `PassBaggage`
  ADD CONSTRAINT `FK_BaggagePassID` FOREIGN KEY (`Passenger`) REFERENCES `Passenger` (`PassengerID`),
  ADD CONSTRAINT `FK_PassBaggageID` FOREIGN KEY (`Baggage`) REFERENCES `Baggage` (`BaggageID`);

--
-- Constraints for table `Passenger`
--
ALTER TABLE `Passenger`
  ADD CONSTRAINT `FK_AirCraftSeat` FOREIGN KEY (`PassAircraftSeat`) REFERENCES `AircraftSeating` (`AircraftSeatID`),
  ADD CONSTRAINT `FK_AssistanceID` FOREIGN KEY (`PassAssistType`) REFERENCES `PassAssistance` (`AssistanceID`),
  ADD CONSTRAINT `FK_FlightID` FOREIGN KEY (`PassFlightID`) REFERENCES `Flight` (`FlightID`),
  ADD CONSTRAINT `FK_PassBookingID` FOREIGN KEY (`PassBookingID`) REFERENCES `Booking` (`BookingID`),
  ADD CONSTRAINT `FK_PassTitle` FOREIGN KEY (`PassengerTitleID`) REFERENCES `Title` (`TitleID`),
  ADD CONSTRAINT `FK_PassengerType` FOREIGN KEY (`PassType`) REFERENCES `PassengerTypes` (`PassengerTypeID`),
  ADD CONSTRAINT `FK_PassportID` FOREIGN KEY (`PassPassportID`) REFERENCES `Passports` (`PassportID`),
  ADD CONSTRAINT `FK_TravelReason` FOREIGN KEY (`PassTravelReason`) REFERENCES `ReasonForTravel` (`TravelReasonID`);

--
-- Constraints for table `PassSportsEquipment`
--
ALTER TABLE `PassSportsEquipment`
  ADD CONSTRAINT `FK_PassengerSportsEquipID` FOREIGN KEY (`Equipment`) REFERENCES `SportsEquipment` (`SportsEquipmentID`),
  ADD CONSTRAINT `FK_SportsEquipPassengerID` FOREIGN KEY (`Passenger`) REFERENCES `Passenger` (`PassengerID`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `FK_AccountID` FOREIGN KEY (`AccountID`) REFERENCES `UserAccount` (`AccountID`);

--
-- Constraints for table `Route`
--
ALTER TABLE `Route`
  ADD CONSTRAINT `FK_DepartureAirportID` FOREIGN KEY (`DepartAirport`) REFERENCES `Airport` (`AirportID`),
  ADD CONSTRAINT `Fk_ArrivalAirportID` FOREIGN KEY (`ArrivalAirport`) REFERENCES `Airport` (`AirportID`);

--
-- Constraints for table `Seating`
--
ALTER TABLE `Seating`
  ADD CONSTRAINT `FK_SeatTypeID` FOREIGN KEY (`SeatTypeID`) REFERENCES `SeatType` (`SeatTypeID`);

--
-- Constraints for table `SeatPrice`
--
ALTER TABLE `SeatPrice`
  ADD CONSTRAINT `FK_SeatPriceCurrency` FOREIGN KEY (`CurrencyID`) REFERENCES `Currency` (`CurrencyID`),
  ADD CONSTRAINT `FK_SeatTypePriceID` FOREIGN KEY (`SeatTypeID`) REFERENCES `SeatType` (`SeatTypeID`);

--
-- Constraints for table `SportsEquipment`
--
ALTER TABLE `SportsEquipment`
  ADD CONSTRAINT `FK_EquipTypeID` FOREIGN KEY (`EquipTypeID`) REFERENCES `SportsEquipTypes` (`SporstTypeID`),
  ADD CONSTRAINT `FK_SportsEqipCurrencyID` FOREIGN KEY (`CurrencyID`) REFERENCES `Currency` (`CurrencyID`);

--
-- Constraints for table `UserAccount`
--
ALTER TABLE `UserAccount`
  ADD CONSTRAINT `FK_AccountTyperID1` FOREIGN KEY (`AccountType`) REFERENCES `AccountType` (`AccountTypeID`),
  ADD CONSTRAINT `FK_CustomerAccID` FOREIGN KEY (`CustID`) REFERENCES `Customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
