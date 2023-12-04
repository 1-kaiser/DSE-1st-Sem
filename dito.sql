-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 10:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dito`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptedrequest`
--

CREATE TABLE `acceptedrequest` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acceptedrequest`
--

INSERT INTO `acceptedrequest` (`id`, `name`, `email`, `contact`, `request`) VALUES
(10, 'Emmanuel Punay', 'emmanuelpunay6906@gmail.com', '09351686906', 'Wireless Mouse'),
(18, 'Emman Nimedez', 'nimedez@gmail.com', '09232428342', 'Side'),
(47, 'John Robert Castillo', 'robert@gmail.com', '09234234232', 'Hand Clutch and Engine for Motorcycle'),
(50, 'Eliezar Punay', 'eliezarpunay10@gmail.com', '09939017182', 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `archiveName` varchar(200) NOT NULL,
  `archiveEmail` varchar(200) NOT NULL,
  `archiveContact` varchar(200) NOT NULL,
  `archiveRequest` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `archiveName`, `archiveEmail`, `archiveContact`, `archiveRequest`) VALUES
(48, 'Aeron Romart De Guia', 'romart@gmail.com', '09234234233', '2 Packs of Yellow Paper'),
(49, 'Iverson Fredrick Norberte', 'fredrick@gmail.com', '09253453452', 'Magnifying Glass');

-- --------------------------------------------------------

--
-- Table structure for table `clientrequestlist`
--

CREATE TABLE `clientrequestlist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientrequestlist`
--

INSERT INTO `clientrequestlist` (`id`, `name`, `email`, `contact`, `address`, `request`) VALUES
(53, 'Ruen Malvar', 'malvar@gmail.com', '09242342899', '143 Blk. St. Dagat-dagatan, Caloocan City', 'A4 Size Photo Paper');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(11) NOT NULL,
  `customerName` varchar(200) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productBrand` varchar(100) NOT NULL,
  `productPrice` int(200) NOT NULL,
  `productQty` int(200) NOT NULL,
  `orderDate` date NOT NULL,
  `printDate` date NOT NULL,
  `delivery` varchar(200) NOT NULL,
  `sortCenter` varchar(200) NOT NULL,
  `orderNo` varchar(200) NOT NULL,
  `trackingNo` varchar(200) NOT NULL,
  `deliveryStatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`delivery_id`, `customerName`, `productName`, `productBrand`, `productPrice`, `productQty`, `orderDate`, `printDate`, `delivery`, `sortCenter`, `orderNo`, `trackingNo`, `deliveryStatus`) VALUES
(9, 'Emmanuel Punay', 'Wireless Mouse', '', 138, 1, '2023-11-18', '2023-11-26', 'DITO Logistics', 'DITO', '012349192037', '982374039873245', 'Delivered'),
(18, 'Emman Nimedez', 'Airpods', '', 22000, 2, '2023-11-13', '2023-11-19', 'Lazada Logistics', 'LEX PH', '51727901184684', '19007773981169', 'Delivered'),
(19, 'Amelie Cornelio', 'DDR4 RAM', '', 12000, 3, '2023-12-03', '2023-11-28', 'Lazada Logistics', 'LEX PH', '93026718573195', '68563142991175', 'Departed From Overseas Sort Center'),
(20, 'Snow White', 'Arduino Sensor', '', 12398, 2, '2023-11-19', '2023-12-03', 'Lazada Logistics', 'LEX PH', '73567042957550', '36644706689561', 'Arrived at Logistics Hub'),
(21, 'Omar Three', 'Vaoe', '', 32912, 3, '2023-12-03', '2023-12-02', 'Omar One', 'Omar 2', '94683792763418', '86043834999596', 'Package Arriving'),
(22, 'John Robert Castillo', 'A4 Photo Paper', 'PH', 400, 2, '2023-12-16', '2023-12-09', 'asdfasdf', 'asd', '33242964151468', '93140293274700', 'Departed From Sort Center');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(200) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `pic` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `employee_id`, `password`, `role`, `creationDate`, `pic`) VALUES
(8, '2871D', '$2y$10$n//92Tw7.09WxFNrpGROVOtKUY.pfPKmh4qKkx86SaOj6fhlBhwua', 'Main Admin', '2023-11-26 06:34:28', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptedrequest`
--
ALTER TABLE `acceptedrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientrequestlist`
--
ALTER TABLE `clientrequestlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptedrequest`
--
ALTER TABLE `acceptedrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `clientrequestlist`
--
ALTER TABLE `clientrequestlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
