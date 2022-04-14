-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 05:36 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rans_roadsters`
--
CREATE DATABASE IF NOT EXISTS `rans_roadsters` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rans_roadsters`;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `CarID` int(3) NOT NULL,
  `Vin` varchar(17) NOT NULL,
  `CarName` varchar(40) DEFAULT NULL,
  `Model` varchar(30) DEFAULT NULL,
  `Brand` varchar(20) DEFAULT NULL,
  `ManYear` year(4) DEFAULT NULL,
  `Color` varchar(10) DEFAULT NULL,
  `MPG` decimal(3,0) DEFAULT NULL,
  `Image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`CarID`, `Vin`, `CarName`, `Model`, `Brand`, `ManYear`, `Color`, `MPG`, `Image`) VALUES
(1, '1BAGNB7A3TF071506', 'Chevrolet HHR', 'HHR', 'CHEVROLET', 2007, 'Purple', '26', 'ChevHHR.jpg'),
(2, '1FAFP58S11A177991', 'MercedesBenz ML350', 'ML350', 'MERCEDESBENZ', 2011, 'White', '20', 'MercedesBenzMI.jpg'),
(3, 'JH4KA4640JC021212', 'Dodge DURANGO', 'Durango', 'Dodge', 2015, 'Black', '23', 'Durango.jpg'),
(4, '2A11S168224', 'Ford Pinto', 'Pinto', 'Ford', 1972, 'White', '26', 'FordPinto.jpg'),
(5, '3VWSW21C98M530338', 'VW Beetle', 'Beetle', 'Volkswagen', 1983, 'Cream', '30', 'Beetle.jpg'),
(6, '875464', '\'Shaguar\' E-Type', 'E-Type', 'Jaguar Cars', 1961, 'British', '16', 'AustinP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(3) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `OrderID` smallint(5) DEFAULT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` tinyint(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` smallint(5) NOT NULL,
  `OrderTotal` decimal(8,2) NOT NULL,
  `CustomerID` int(3) NOT NULL,
  `DateOfPurchase` date NOT NULL,
  `Phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `CarID` int(3) NOT NULL,
  `Vin` varchar(17) NOT NULL,
  `SupplierName` varchar(40) DEFAULT NULL,
  `DeliveryDate` date NOT NULL,
  `ManCost` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`CarID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`CarID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `CarID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` smallint(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`CarID`) REFERENCES `cars` (`CarID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
