-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 08:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spideydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `gender` int(5) NOT NULL,
  `custAddress` varchar(255) NOT NULL,
  `custContact` varchar(12) NOT NULL,
  `custEmail` varchar(50) NOT NULL,
  `level_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `username`, `password`, `custName`, `gender`, `custAddress`, `custContact`, `custEmail`, `level_id`) VALUES
(1, 'admin', 'abc', 'Iffat Haikal', 1, 'E-2-4,Villa Condominimum,Lebuh Relau 2,11900 Bayan Lepas,Pulau Pinang', '+60123456789', 'iffathaikal7@gmail.com', 1),
(6, 'paan1', 'paan1', 'Paan', 1, 'Bedong,Kedah', '', 'paankakap@yahoo.com.my', 3),
(7, 'piq', 'piq', 'Syapiq', 2, 'Johor', '0147894778', 'syaky@mail.com', 2),
(8, 'sann', 'sann', 'Ihsan Zack', 1, 'Selangor PKP', '+0155555555', 'ihsangaming@uitm.edu.my', 2);
--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
