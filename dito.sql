-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 12:06 PM
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
  `contact` int(11) NOT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acceptedrequest`
--

INSERT INTO `acceptedrequest` (`id`, `name`, `email`, `contact`, `request`) VALUES
(4, 'EMMAN', 'emmanuelpunay6906@gmail.com', 2147483647, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `archiveName` varchar(200) NOT NULL,
  `archiveEmail` varchar(200) NOT NULL,
  `archiveContact` int(200) NOT NULL,
  `archiveRequest` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `archiveName`, `archiveEmail`, `archiveContact`, `archiveRequest`) VALUES
(5, 'Yunjin', 'yunjin@gmail.com', 2147483647, 'iced tea'),
(6, 'Chaewon', 'chae@gmail.com', 2147483647, 'drinks');

-- --------------------------------------------------------

--
-- Table structure for table `clientrequestlist`
--

CREATE TABLE `clientrequestlist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientrequestlist`
--

INSERT INTO `clientrequestlist` (`id`, `name`, `email`, `contact`, `request`) VALUES
(7, 'Sakura', 'sakura@gmail.coom', '09242324322', 'vinyl');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `delivery_id` int(11) NOT NULL,
  `customerName` varchar(200) NOT NULL,
  `customerAddress` varchar(200) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productPrice` int(200) NOT NULL,
  `productQty` int(200) NOT NULL,
  `orderDate` date NOT NULL,
  `printDate` date NOT NULL,
  `delivery` varchar(200) NOT NULL,
  `sortCenter` varchar(200) NOT NULL,
  `orderNo` int(200) NOT NULL,
  `trackingNo` int(200) NOT NULL,
  `sellerAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `employee_id`, `password`) VALUES
(8, '2871D', '$2y$10$n//92Tw7.09WxFNrpGROVOtKUY.pfPKmh4qKkx86SaOj6fhlBhwua');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clientrequestlist`
--
ALTER TABLE `clientrequestlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
