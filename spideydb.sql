-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 11:41 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
(6, 'paan1', 'paan1', 'Farhan', 1, 'Bedong,kedah', '012458795', 'paankakap@yahoo.com.my', 3),
(9, 'sann', 'sann', 'Ihsan Zack', 1, 'Selangor PKPD', '018456987', 'sanngaming@fn.com', 3),
(11, 'man', 'm', 'man', 1, 'bukit mertajam', '0123', 'man@cis.com', 3),
(14, 'sya', 's', 'Syapiq', 1, 'Johor', '0147894778', 'syaky@mail.com', 3),
(15, 'aimanh', 'aiman', 'Aiman', 1, 'Bukit Jambul', '0145879625', 'aimanhariz@gmail.com', 3),
(16, 'alia', 'alia', 'Alia Nur', 2, 'Bukit Mertajam', '01254689', 'alia@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `gender` int(5) NOT NULL,
  `employeeAddress` varchar(255) NOT NULL,
  `employeeContact` varchar(12) NOT NULL,
  `employeeEmail` varchar(50) NOT NULL,
  `level` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `username`, `password`, `employeeName`, `gender`, `employeeAddress`, `employeeContact`, `employeeEmail`, `level`) VALUES
(1, 'admin', 'abc', 'Iffat Haikal', 1, 'E-2-4,Villa Condominimum,Lebuh Relau 2,11900 Bayan...', '+60123456789', 'iffathaikal7@gmail.com', 1),
(2, 'fans', 'f', 'fans', 1, 'pahang', '01999', 'fans@hot.com', 2),
(3, 'itachi', 'i', 'itachi', 1, 'apaaa', '01477889', 'itachi@i.com', 2),
(4, 'hana', 'h', 'hana', 2, 'penang', '01888', 'hana@mail.com', 2),
(10, 'kick', 'k', 'kick', 1, 'mamama', '0145', 'kick@b.com', 2),
(11, 'lama', 'l', 'Acap Paan', 1, 'Bedong,Kedah', '+60121111117', 'paankakap@yahoo.com.my', 2);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(10) NOT NULL,
  `level_des` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_des`) VALUES
(1, 'Employee'),
(2, 'Customer'),
(0, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(10) NOT NULL,
  `packageName` varchar(255) NOT NULL,
  `packagePrice` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `packageName`, `packagePrice`) VALUES
(1, 'Spidey Pack XS', 5),
(2, 'Spidey Pack S', 7),
(3, 'Spidey Pack M', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(10) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `trackingID` int(10) NOT NULL,
  `date` date NOT NULL,
  `curLocation` varchar(255) NOT NULL,
  `packageID` int(10) NOT NULL,
  `custID` int(10) NOT NULL,
  `branchID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`trackingID`, `date`, `curLocation`, `packageID`, `custID`, `branchID`) VALUES
(5, '2021-07-13', 'japan', 3, 6, 'Sungai petani'),
(6, '2021-07-13', 'das', 1, 9, 'Sarawak'),
(101, '2021-07-17', 'pokok sena', 2, 11, ' penang sepulau'),
(102, '2021-07-17', 'depot', 2, 11, ' Ipoh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` int(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `gender`, `address`, `telephone`, `email`, `level_id`) VALUES
(1, 'admin', 'abc', 'Iffat Haikal', 1, 'E-2-4,Villa Condominimum,Lebuh Relau 2,11900 Bayan Lepas,Pulau Pinang', '+60123456789', 'iffathaikal7@gmail.com', 1),
(6, 'paan1', 'paan1', 'Paan', 1, 'Bedong,Kedah', '', 'paankakap@yahoo.com.my', 3),
(9, 'haikal2', 'haikal2', 'MUHAMMAD IFFAT HAIKAL SAABAN HAFIZHI', 1, '2-U,JALAN SULTAN AZLAN SHAH,', '0174559677', 'iffathaikal7@gmail.com', 3),
(14, 'sus', 's', 'sasuke', 1, 'aaaaaaa', '01234567', 'sasuke@akatsuki.com', 3),
(16, 'name_iffat', '12345', 'orang', 2, '', '', 'org@org.', 3),
(17, 'org', 'org', 'orang', 2, 'hgd', '065465', 'org@org.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`trackingID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
